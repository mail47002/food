
<footer class="footer">
	<div class="container">
		<span>© Всі права захищені</span>
		<a href="#">Умови використання та конфіденційність</a>
		<a href="#">Контакти</a>
	</div>
</footer>


{{-- Улюблені --}}
<!-- Modal -->
<div id="modal_likes" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content text-center">
			<div class="modal-header">
				<a href="#" type="button" class="close link-red" data-dismiss="modal"><i class="fo fo-delete"></i></a>
				<h4 class="modal-title">Улюблені</h4>
			</div>
			<div class="modal-body">
				<div class="content">

@for($i=0;$i<5;$i++)
					<div class="caption">
						<a href="#" class="discard link-red"><i class="fo fo-close-rounded"></i></a>
						<div class="avatar">
							<div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>
						</div>
						<p><a href="#" class="link-blue name">Марк</a></p>
						<p class="phone">+38 096 159 15 15</p>
					</div>
@endfor

				</div>
			</div>
		</div>
	</div>
</div>