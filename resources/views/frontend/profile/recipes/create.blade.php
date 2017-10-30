@extends('frontend.layouts.default')

@section('content')
	<div class="js-product">
		<div class="breadcrumbs">
			<div class="container">
				<ul class="list-inline">
					<li><a href="{{ route('profile.articles.index') }}" class="link-blue back"><i class="fo fo-arrow-left fo-small"></i> Повернутися</a></li>
				</ul>
			</div>
		</div>
		<div class="bg-yellow">
			<h5 class="title-with-indent red">Нова страва</h5>
		</div>
		<div class="container-half text-center">
			{{ Form::open(['route' => 'profile.recipes.store', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'edit']) }}
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
					</div>
					<a href="#" class="link-red-dark js-add-ingredient">+ Додати</a>
				</div>

				<div class="form-group">
					{{ Form::label('description', 'Про рецепт*') }}
					{{ Form::textarea('description', null, ['id' => 'input-description', 'class' => 'wide']) }}
				</div>

				<div class="form-group">
					{{ Form::label('fotos', 'Додати фото*') }}
					<div id="input-images" class="fotos">
						<div class="wrap js-foto">
							<div class="uploader">
								<img src="">
								<div class="round"><i class="fo fo-camera"></i></div>
								{{ Form::file(null, ['class' => 'input-upload']) }}
								{{ Form::hidden('images[]', null) }}
							</div>
							<a href="#" class="pull-left hide grey1 js-main-foto"><i class="fo fo-check-rounded"></i><span class="hide">Головне</span></a>
							<a href="#" class="pull-right link-red-dark hide remove js-delete-foto"><i class="fo fo-close-rounded"></i></a>
						</div>
					</div>
					{{ Form::hidden('image', null, ['id' => 'product-image']) }}
				</div>

				{{ Form::label('recipe', 'Спосіб приготування') }}
				<div class="recipes">
					<div class="js-foto js-foto-steps">
						<span class="title">Крок 1</span><span class="remove"></span>
						<div class="uploader uploader-steps">
							<img src="">
							<div class="round"><i class="fo fo-camera"></i></div>
							{{ Form::file(null, ['class' => 'input-upload input-upload-steps']) }}
							{{ Form::hidden('step_images[]', null) }}

						</div>
						{{-- Удаление фото?? Нужно?? --}}
						<textarea class="step-texts" name="step_texts[]" type="text" required="required" /></textarea>
					</div>
					<a href="#" id="cloneRecipe" class="link-red-dark">+ Додати</a>
				</div>

				<div class="form-group">
					{{ Form::label('video', 'Посилання на відео') }}
					<div class="videos js-video">
						<div>
							{{ Form::text('video[]', null, ['id' => 'input-video-0']) }}
							<span class="remove js-delete-video"></span>
						</div>
					</div>
					<a href="#" class="link-red-dark js-add-video">+ Додати</a>
				</div>

				{{ Form::submit('Створити рецепт', ['class' => 'button button-red']) }}
			{{ Form::close() }}
		</div>
	</div>
	<div class="js-product-success"></div>
@stop

@push('scripts')
	<script type="text/javascript">
		// Ingredient
    $('.js-add-ingredient').on('click', function(e) {
        e.preventDefault();

        var i = $('.js-ingredients > div').length;

        $('.js-ingredients').append('<div><input id="input-ingredient-' + i + '" name="ingredient[]" type="text" /><span class="remove js-delete-ingredient"></span></div>');
    });

    $('body').on('click', '.js-delete-ingredient', function(e) {
        e.preventDefault();

        $(this).parent().remove();

        $('.js-ingredients > div').each(function(i) {
            $(this).attr('id', 'input-ingredient-' + i);
        });
    });

    // Клонируем шаг рецепта
		var count = 0;
		var inputRecipe = $('.recipes > div').clone();
		$("#cloneRecipe").on("click", function(e){
			e.preventDefault();

			count++;
			recipeCount = $('.recipes').children().length; // Для номера "Крок"
			var newBlock = inputRecipe.clone();
			newBlock.find('#image').attr('id', 'image'+count);
			newBlock.find('.title').text('Крок '+recipeCount);

			$(newBlock).insertBefore(this);

			document.getElementById('image'+count)
					.addEventListener('change', handleImage, false);
		});

    // Video
    $('.js-add-video').on('click', function(e) {
        e.preventDefault();

        var i = $('.js-video > div').length;

        $('.js-video').append('<div><input id="input-video-' + i + '" name="video[]" type="text" /><span class="remove js-delete-video"></span></div>');
    });

    $('body').on('click', '.js-delete-video', function(e) {
        e.preventDefault();

        $(this).parent().remove();

        $('.js-video > div').each(function(i) {
            $(this).attr('id', 'input-video-' + i);
        });
    });

    // Fotos
		$('body').on('change', '.input-upload', function() {
			var self = $(this),
				i = $('.fotos > .js-foto').length,
        id = self.closest('.uploader').find('input[name="images[]"]').val(),
        url =  id ? '{{ url('profile/recipes/image') }}/' + id : '{{ url('profile/recipes/image/store') }}',
				data = new FormData();

				data.append('_token', '{{ csrf_token() }}');
				data.append('image', self[0].files[0]);

				$.ajax({
					url: url,
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
					success: function(data) {
						if (data['success']) {
							self.closest('.uploader').find('img').attr('src', data['image']['thumbnail']);
							self.closest('.uploader').find('input[name="images[]"]').val(data['image']['id']);

							if (i == 1) {
								self.closest('.js-foto').find('.js-main-foto').addClass('active');
								$('#product-image').val(data['image']['id']);
							}
						}
					},
					error: function(data) {
						var data = data.responseJSON;
					}
      	});
      });

      $('body').on('click', '.js-main-foto', function(e) {
        e.preventDefault();

        $('.fotos .js-main-foto').removeClass('active');

        $(this).addClass('active');

        $('#product-image').val($(this).closest('.js-foto').find('input[name="images[]"]').val());
			});

    $('body').on('click', '.js-delete-foto', function(e) {
      e.preventDefault();
      var self = $(this),
			id = $(this).closest('.js-foto').find('input[name="images[]"]').val(),
			data = {
				'_token': '{{ csrf_token() }}',
				'_method': 'delete'
			};

      $.post('{{ url('profile/recipes/image') }}/' + id, data).done(function(data) {
        if (data['success']) {
            self.parent().remove();
				}
      });
		});
	</script>
	<script type="text/javascript">
		 // Fotos steps
		$('body').on('change', '.input-upload-steps', function() {
			var self = $(this),
				i = $('.recipes > .js-foto-steps').length,
        id = self.closest('.uploader-steps').find('input[name="step_images[]"]').val(),
        url =  id ? '{{ url('profile/recipes/step/image') }}/' + id : '{{ url('profile/recipes/step/store') }}',
				data = new FormData();
				console.log(id);
				console.log(url);
				data.append('_token', '{{ csrf_token() }}');
				data.append('image', self[0].files[0]);
				console.log(self[0].files[0]);
				$.ajax({
					url: url,
					method: 'post',
					data: data,
					processData: false,
					contentType: false,
					beforeSend: function() {
          },
					success: function(data) {
						if (data['success']) {
							self.closest('.uploader-steps').find('img').attr('src', data['image']['thumbnail']);
							self.closest('.uploader-steps').find('input[name="step_images[]"]').val(data['image']['id']);
							self.closest('.uploader-steps').next('.step-texts').attr('name','step_text['+data['image']['id']+']');
						}
					},
					error: function(data) {
						var data = data.responseJSON;
					}
      	});
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
				beforeSend: function() {
          $('#message').hide();
					form.find(':submit').attr('disabled', true);
					form.find('.has-error').removeClass('has-error');
					form.find('.error').removeClass('error');
					$('.body-overlay').addClass('active');
				},
				success: function(data) {
          if (data['success']) {
						location = '{{ route('profile.recipes.success') }}';
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