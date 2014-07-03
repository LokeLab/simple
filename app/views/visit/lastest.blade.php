
<ul class="feeds">
@foreach($campaigns_list as $c)

	<li>
		<div class="col1">
			<div class="cont">
				<div class="cont-col1">
					<div class="label label-sm label-info">
						<i class="fa fa-bullseye"></i>
					</div>
				</div>
				<div class="cont-col2">
					<div class="desc">
						 {{ $c['description']}} <a href="campaigns/{{ $c['id']}}" class="green"><i class="fa fa-eye"></i></a>
					</div>
				</div>
			</div>
		</div>
	</li>
@endforeach
</ul>
