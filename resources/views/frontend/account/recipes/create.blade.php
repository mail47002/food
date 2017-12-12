@extends('frontend.layouts.default')

@section('content')
	<div class="js-product">
		<div class="breadcrumbs">
			<div class="container">
				<ul class="list-inline">
					<li><a href="{{ route('account.articles.index') }}" class="link-blue back"><i class="fo fo-arrow-left fo-small"></i> Повернутися</a></li>
				</ul>
			</div>
		</div>
		<div class="bg-yellow">
			<h5 class="title-with-indent red">Нова страва</h5>
		</div>
		<div class="container-half text-center">
			{{ Form::open(['route' => 'account.recipes.store', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'edit']) }}
				<p class="message" id="message">Заповніть виділені поля</p>

				<div class="form-group">
					{{ Form::label('name', 'Назва рецпту*') }}
					{{ Form::text('name', null, ['id' => 'input-name', 'class' => 'wide']) }}
				</div>

				<div class="form-group">
					{{ Form::label('name', 'Виберіть одну або декілька категорій*') }}
					<div id="input-category" class="catgories clearfix">
						@foreach ($categories as $category)
							<div class="col-md-4">
								{{ Form::checkbox('category[]', $category->id, false, ['id' => 'cat-' . $category->id]) }}
								{{ Form::label('cat-' . $category->id, $category->name) }}
							</div>
						@endforeach
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('ingredients', 'Інгредієнти*') }}
					<div class="ingredients js-ingredients">
						<div>
							{{ Form::text('ingredient[]', null, ['id' => 'input-ingredient-0']) }}
							<span class="remove js-delete-ingredient"></span>
						</div>
						<a href="#" class="link-red-dark js-add-ingredient">+ Додати</a>
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('description', 'Про рецепт*') }}
					{{ Form::textarea('description', null, ['id' => 'input-description', 'class' => 'wide']) }}
				</div>

				<div class="form-group">
					{{ Form::label('fotos', 'Додати фото*') }}
					<div id="input-image" class="fotos">
						<div class="wrap js-foto">
							<div class="uploader">
								<img src="">
								<div class="round"><i class="fo fo-camera"></i></div>
								{{ Form::file(null, ['class' => 'input-upload-foto', 'id' => 'foto']) }}
							</div>
							<a href="#" class="pull-left hide grey1 js-cover-foto"><i class="fo fo-check-rounded"></i><span class="hide">Головне</span></a>
							<a href="#" class="pull-right link-red-dark hide remove js-delete-foto"><i class="fo fo-close-rounded"></i></a>
						</div>
					</div>
					{{ Form::hidden('image', null, ['id' => 'cover-image']) }}
				</div>

				{{ Form::label('recipe', 'Спосіб приготування') }}
				<div class="recipes">
					<div class="js-foto js-foto-steps">
						<span class="title">Крок 1</span><span class="remove"></span>
						<div class="uploader uploader-steps">
							<img src="">
							{{ Form::file(null, ['class' => 'input-upload-steps', 'id' => 'step_image0']) }}
							{{ Form::hidden('step_image[]', null, ['id' => 'step-0']) }}
							<div class="round"><i class="fo fo-camera"></i></div>
						</div>
						{{-- Удаление фото?? Нужно?? --}}
						<textarea class="step-texts" name="step_text[]" type="text" required="required" /></textarea>
					</div>
					<a href="#" id="cloneRecipe" class="link-red-dark">+ Додати</a>
				</div>

				<div id="recipeBlank" class="hidden"> {{-- Скрытый блок для клонирования --}}
					<div class="js-foto js-foto-steps">
						<span class="title">Крок 1</span><span class="remove"></span>
						<div class="uploader uploader-steps">
							<img src="">
							{{ Form::file(null, ['class' => 'input-upload-steps', 'id' => 'step_image']) }}
							{{ Form::hidden('step_image[]', null, ['id' => 'step']) }}
							<div class="round"><i class="fo fo-camera"></i></div>
						</div>
						<textarea class="step-texts" name="step_text[]" type="text" required="required" /></textarea>
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('video', 'Посилання на відео') }}
					<div class="videos js-video">
						<div>
							{{ Form::text('video[]', null, ['id' => 'input-video-0']) }}
							<span class="remove js-delete-video"></span>
						</div>
						<a href="#" class="link-red-dark js-add-video">+ Додати</a>
					</div>
				</div>

				{{ Form::submit('Створити рецепт', ['class' => 'button button-red']) }}
			{{ Form::close() }}
		</div>
	</div>
	<div class="js-product-success"></div>
@stop

@push('scripts')
	<script type="text/javascript">

{{-- Загрузка картинок --}}
	document.getElementById('foto')
			.addEventListener('change', handleImage, false);

	document.getElementById('step_image0')
			.addEventListener('change', handleImage, false);

    // Fotos
		$(document).on('change', '.input-upload-foto', function() {
			var self = $(this),
				i = $('.fotos > .js-foto').length,
				data = new FormData();

			data.append('_token', '{{ csrf_token() }}');
			data.append('image', self[0].files[0]);

			$.ajax({
				url: '{{ url('api/image/store') }}',
				method: 'post',
				data: data,
				processData: false,
				contentType: false,
				beforeSend: function() {
	        if ((self.closest('.js-foto').index() + 1) == i) {
            $('.fotos .js-foto:last-child').clone().appendTo('.fotos');
            $('.fotos .js-foto:last-child').find('img').attr('src', '');
            $('.fotos .js-foto:last-child').find(':file').val('');

            $('.fotos .js-foto:not(:last-child)').find('a').removeClass('hide');
            $('.fotos .js-foto:not(:last-child)').find('.round').remove();
	        }
        },
				success: function(responce) {
					if (responce) {
						self.closest('.uploader').find('img').attr('src', responce['url']);
						self.closest('.uploader').append('<input type="hidden" name="images[]" value="' + responce['image'] + '"/>');

						if (i == 1) {
							self.closest('.js-foto').find('.js-main-foto').addClass('active');
							$('#cover-image').val(responce['image']);
						}

            self.closest('.uploader').find('.input-upload-foto').remove();
					}
				},
				error: function(data) {
					var data = data.responseJSON;
				}
  		});
    });

    $(document).on('click', '.js-delete-foto', function(e) {
      e.preventDefault();

      var self = $(this),
				image = self.closest('.js-foto').find('input[name="images[]"]').val();

      if (image) {
        $.post('{{ url('api/image/delete') }}', {
          '_token': '{{ csrf_token() }}',
          '_method': 'delete',
          'image': image
        }).done(function (response) {
          if (response) {
            self.parent().remove();

            if (image == $('#cover-image').val()) {
              $('#cover-image').val('');
						}
    			}
        });
      }
    });

    $(document).on('click', '.js-cover-foto', function(e) {
      e.preventDefault();
      $('.fotos .js-cover-foto').removeClass('active');
      $(this).addClass('active');
      $('#cover-image').val($(this).closest('.js-foto').find('input[name="images[]"]').val());
		});

		 // Fotos steps
		$('body').on('change', '.input-upload-steps', function() {
			var self = $(this),
				i = $('.recipes > .js-foto-steps').length,
        id = self.closest('.input-upload-steps').find('input[name="step_image[]"]').val(),
        url =  '{{ url('api/image/store') }}',
				data = new FormData();

			data.append('_token', '{{ csrf_token() }}');
			data.append('image', self[0].files[0]);

			$.ajax({
				url: url,
				method: 'post',
				data: data,
				processData: false,
				contentType: false,
				success: function(data) {
					console.log(data);
					if (data) {
						self.closest('.uploader-steps').find('img').attr('src', data['url']);
						self.closest('.uploader-steps').find('input[name="step_image[]"]').val(data['image']);
					}
				},
				error: function(data) {
					var data = data.responseJSON;
				}
    	});
    });

    $('body').on('click', '.remove', function(e){
    	e.preventDefault();
    	$(this).parent().remove();
    });
	</script>
	<script type="text/javascript">
		$(document).on('submit', 'form', function(e) {
			e.preventDefault();

			var form = $(this);

			$.ajax({
				url: form.attr('action'),
				method: form.attr('method'),
        		data: form.serialize(),
				// beforeSend: function() {
    //       			$('#message').hide();
				// 	form.find(':submit').attr('disabled', true);
				// 	form.find('.has-error').removeClass('has-error');
				// 	form.find('.error').removeClass('error');
				// 	$('.body-overlay').addClass('active');
				// },
				success: function(data) {
					console.log(data);
					if (data['success']) {
								location = '{{ route('account.recipes.success') }}';
					}
				},
				error: function(data) {
					var data = data.responseJSON;

					form.find(':submit').attr('disabled', false);

					$('.body-overlay').removeClass('active');

					$('#message').show();

					for (name in data.errors) {
			            if (name.indexOf('.') > 0) {
			                var parts = name.split('.');

			                target = form.find('#input-' + parts[0] + '-' + parts[1]);
			            } else {
			                target = form.find('#input-' + name);
		            	}

            			target.addClass('error');
            			target.closest('.form-group').addClass('has-error');
					}
				}
			});
		});
	</script>
@endpush