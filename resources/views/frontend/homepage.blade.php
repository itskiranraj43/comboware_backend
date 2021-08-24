@extends('layouts.app')

@section('content')
						
<div class="row">
	<div class="col-12">
		<div class="my-info-container">
			<div class="my-info-box">
					<div class="me-info-block">
							<div class="my-photo-block">
									<img src="https://via.placeholder.com/60x60/eee?text=" class="center-block" alt="Avatar">
							</div>
							<div class="my-info">
									<div class="name">
											<span>
													Seller
											</span>
											<a href="https://.incevio.com/my/account" class="small indent10"><i class="fas fa-edit" data-toggle="tooltip" data-title="Edit My Account" data-original-title="" title=""></i></a>
									</div>
									<div class="messages">
											<span>
												<i class="fas fa-clock-o"></i>
												Member since: <em>2 years ago</em>
											</span>
									</div>
							</div>

							<div class="pull-right">
									<a href="https://.incevio.com" class="btn btn-primary flat">
										<i class="fas fa-shopping-cart"></i> Continue Shopping                    </a>

																	</div>
					</div>
			</div><!-- .my-info-box -->

			<div class="my-info-details">
				<form action="{{ route('logout') }}" method="POST">
					{{csrf_field()}}
					<button class="btn btn-primary">logout</button>
				</form>	
			</div><!-- .my-info-details -->
		</div><!-- .my-info-container -->
	</div><!-- .col-sm-12 -->
</div><!-- .row -->

<!-- aaya sudhi -->
<div class="row">
	<div class="col-md-6 nopadding-right">
		<table class="table table-bordered">
			<thead>
				<tr class="text-muted">
					<th>Date</th>
					<th>
						Orders
						<i class="fas fa-question-circle pull-right" data-toggle="tooltip" data-title="Item count" data-original-title="" title=""></i>
					</th>
					<th>Amount</th>
				</tr>
			</thead>
			<tbody>
									<tr>
						<td>Jul 3</td>
						<td>
							<img src="https://.incevio.com/image/images/Zbpr1tbiBu.png?p=tiny_thumb" class="img-circle" alt="Big Shop" data-toggle="tooltip" data-title="Big Shop" data-original-title="" title="">
							<a href="https://.incevio.com/order/15">
								#458659
							</a>
							<small class="indent10"><span class="label label-danger">WAITING FOR PAYMENT</span></small>
							<span class="label label-outline pull-right"> 3 </span>
						</td>
						<td>$1,815<sup class="price-fractional">19</sup></td>
					</tr>
									<tr>
						<td>Jun 25</td>
						<td>
							<img src="https://.incevio.com/image/images/wXnapp1lZa.png?p=tiny_thumb" class="img-circle" alt="Amz Mart" data-toggle="tooltip" data-title="Amz Mart" data-original-title="" title="">
							<a href="https://.incevio.com/order/12">
								#150281
							</a>
							<small class="indent10"><span class="label label-danger">WAITING FOR PAYMENT</span></small>
							<span class="label label-outline pull-right"> 3 </span>
						</td>
						<td>$3,029<sup class="price-fractional">45</sup></td>
					</tr>
									<tr>
						<td>Jun 21</td>
						<td>
							<img src="https://.incevio.com/image/images/wXnapp1lZa.png?p=tiny_thumb" class="img-circle" alt="Amz Mart" data-toggle="tooltip" data-title="Amz Mart" data-original-title="" title="">
							<a href="https://.incevio.com/order/7">
								#083142
							</a>
							<small class="indent10"><span class="label label-danger">WAITING FOR PAYMENT</span></small>
							<span class="label label-outline pull-right"> 2 </span>
						</td>
						<td>$858<sup class="price-fractional">98</sup></td>
					</tr>
									<tr>
						<td>Jun 18</td>
						<td>
							<img src="https://.incevio.com/image/images/wXnapp1lZa.png?p=tiny_thumb" class="img-circle" alt="Amz Mart" data-toggle="tooltip" data-title="Amz Mart" data-original-title="" title="">
							<a href="https://.incevio.com/order/6">
								#253323
							</a>
							<small class="indent10"><span class="label label-danger">WAITING FOR PAYMENT</span></small>
							<span class="label label-outline pull-right"> 4 </span>
						</td>
						<td>$2,794<sup class="price-fractional">07</sup></td>
					</tr>
									<tr>
						<td>Jun 6</td>
						<td>
							<img src="https://.incevio.com/image/images/wXnapp1lZa.png?p=tiny_thumb" class="img-circle" alt="Amz Mart" data-toggle="tooltip" data-title="Amz Mart" data-original-title="" title="">
							<a href="https://.incevio.com/order/14">
								#726843
							</a>
							<small class="indent10"><span class="label label-danger">WAITING FOR PAYMENT</span></small>
							<span class="label label-outline pull-right"> 2 </span>
						</td>
						<td>$1,032<sup class="price-fractional">92</sup></td>
					</tr>
							</tbody>
		</table>
	</div><!-- .col-sm-6 -->
	<div class="col-md-6 nopadding-left">
		<table class="table table-bordered">
			<thead>
				<tr class="text-muted">
					<th>Wishlist</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
															<tr>
							<td>
								<img class="" src="https://.incevio.com/image/images/G2ZVGlhfUZ.jpg?p=tiny" alt="Sunt rerum sint qui." title="Sunt rerum sint qui.">

								<a class="product-link" href="https://.incevio.com/product/dolor-sint-quaerat-repudiandae-et">Sunt rerum sint qui.</a>
							</td>
							<td>
									<a class="btn btn-primary btn-xs flat" href="https://.incevio.com/checkout/dolor-sint-quaerat-repudiandae-et">
											<i class="fas fa-rocket"></i> Buy Now                  </a>
							</td>
						</tr>

																				<tr>
							<td>
								<img class="" src="https://.incevio.com/image/images/Adqh3TQchj.jpg?p=tiny" alt="Dignissimos iusto ut quasi veritatis omnis et." title="Dignissimos iusto ut quasi veritatis omnis et.">

								<a class="product-link" href="https://.incevio.com/product/aut-doloribus-totam-quia-qui-voluptatem-rem-officiis">Dignissimos iusto ut quasi veritati...</a>
							</td>
							<td>
									<a class="btn btn-primary btn-xs flat" href="https://.incevio.com/checkout/aut-doloribus-totam-quia-qui-voluptatem-rem-officiis">
											<i class="fas fa-rocket"></i> Buy Now                  </a>
							</td>
						</tr>

																				<tr>
							<td>
								<img class="" src="https://.incevio.com/image/images/4egoJApfCw.jpg?p=tiny" alt="Voluptatem maiores repellat et ab." title="Voluptatem maiores repellat et ab.">

								<a class="product-link" href="https://.incevio.com/product/ab-odio-excepturi-dolores-sed-numquam-inventore-deleniti">Voluptatem maiores repellat et ab.</a>
							</td>
							<td>
									<a class="btn btn-primary btn-xs flat" href="https://.incevio.com/checkout/ab-odio-excepturi-dolores-sed-numquam-inventore-deleniti">
											<i class="fas fa-rocket"></i> Buy Now                  </a>
							</td>
						</tr>

																				<tr>
							<td>
								<img class="" src="https://.incevio.com/image/images/k27HniWY1a.jpg?p=tiny" alt="Dolorem praesentium similique repudiandae facere atque." title="Dolorem praesentium similique repudiandae facere atque.">

								<a class="product-link" href="https://.incevio.com/product/et-quam-officia-dolorem-qui-tempore-officia-ut">Dolorem praesentium similique repud...</a>
							</td>
							<td>
									<a class="btn btn-primary btn-xs flat" href="https://.incevio.com/checkout/et-quam-officia-dolorem-qui-tempore-officia-ut">
											<i class="fas fa-rocket"></i> Buy Now                  </a>
							</td>
						</tr>

																				<tr>
							<td>
								<img class="" src="https://.incevio.com/image/images/wtOLyp9zcl.jpg?p=tiny" alt="Nisi voluptas iure omnis placeat aliquid." title="Nisi voluptas iure omnis placeat aliquid.">

								<a class="product-link" href="https://.incevio.com/product/fuga-doloremque-dignissimos-et-quas">Nisi voluptas iure omnis placeat al...</a>
							</td>
							<td>
									<a class="btn btn-primary btn-xs flat" href="https://.incevio.com/checkout/fuga-doloremque-dignissimos-et-quas">
											<i class="fas fa-rocket"></i> Buy Now                  </a>
							</td>
						</tr>

												</tbody>
		</table>
	</div><!-- .col-sm-6 -->
</div><!-- .row -->
<!-- aaya thi -->
@endsection
@section('scripts')
@parent

@endsection