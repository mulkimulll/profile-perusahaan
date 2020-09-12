<nav id="sidebar" class="nav-sidebar">
    <ul class="list-unstyled components" id="accordion">
			<li class="">
	            <a href="#berandasm" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
	                <i class="fa fa-tachometer-alt mr-2"></i> Beranda
	            </a>
	            <ul class="collapse list-unstyled" id="berandasm" data-parent="#accordion">					
					<li><a href="{{route('transaksi')}}">Transaksi Penjualan</a></li>
					<li><a href="{{route('report')}}">Laporan Penjualan</a></li>
	            </ul>
	        </li>
		@role('super,own')
			<li class="">
	            <a href="#mastersm" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
	                <i class="fa fa-database mr-2"></i> Data & Stock
	            </a>
	            <ul class="collapse list-unstyled" id="mastersm" data-parent="#accordion">
					<li><a href="{{route('dist')}}">Data Distributor</a></li>
					<li><a href="{{route('stok')}}">Stok Barang</a></li>
				</ul>
	        </li>
		@endrole
		@role('super,dist,subdist')
			<li>
				<a href="{{route('dist')}}" class=" wave-effect"><i class="fa fa-shopping-cart mr-2"></i> Order Barang</a>
			</li>
		@endrole
		@role('super,own')
			<li>
				<a href="{{route('front')}}" class=" wave-effect"><i class="fa fa-desktop mr-2"></i> Edit Frontnd</a>
			</li>
			<li>
				<a href="{{route('akun')}}" class=" wave-effect"><i class="fa fa-users-cog mr-2"></i> Kelola akun</a>
			</li>
		@endrole
		@role('super,dist')
		<li>
			<a href="{{route('akundist')}}" class=" wave-effect"><i class="fa fa-users-cog mr-2"></i> Kelola akun distributor</a>
		</li>
		@endrole
    </ul>
</nav>
