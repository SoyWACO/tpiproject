<div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>
				<i class="fa fa-user-circle-o i-pd" aria-hidden="true"></i>{{ Auth::user()->name }}
			</h4>
		</div>
			<ul class="list-group">
				<li class="list-group-item">
					<i class="fa fa-institution i-pd" aria-hidden="true"></i>{{ Auth::user()->empresa }}
				</li>
				<li class="list-group-item">
					<i class="fa fa-bookmark i-pd" aria-hidden="true"></i>{{ Auth::user()->sector }}
				</li>
				<li class="list-group-item">
					<i class="fa fa-envelope i-pd" aria-hidden="true"></i><a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a>
				</li>
				<li class="list-group-item">
					<i class="fa fa-phone i-pd" aria-hidden="true"></i><a href="tel:{{ Auth::user()->telefono }}">{{ Auth::user()->telefono }}</a>
				</li>
				<li class="list-group-item">
					<i class="fa fa-globe i-pd" aria-hidden="true"></i><a href="//{{ Auth::user()->web }}" target="_black">{{ Auth::user()->web }}</a>
				</li>
				<li class="list-group-item">
					<i class="fa fa-map-marker i-pd" aria-hidden="true"></i>{{ Auth::user()->ciudad }}
				</li>
				<li class="list-group-item">
					<i class="fa fa-map i-pd" aria-hidden="true"></i>{{ Auth::user()->direccion }}
				</li>
			</ul>
	</div>
</div>