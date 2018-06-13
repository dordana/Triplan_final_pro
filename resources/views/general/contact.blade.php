@extends('layouts.app')

@section('content')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<p id="pageName" hidden >General</p>
		<div id="fh5co-contact" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Contact Information</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<form method="POST" action="" autocomplete="off">
		                {{ csrf_field() }}
					<div class="row animate-box">
						<div class="col-md-6">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3410.94470319847!2d34.791500584625325!3d31.249954067570997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1502666cc7f87775%3A0xaf5e654731053ad8!2z15TXnteb15zXnNeUINeU15DXp9eT157XmdeqINec15TXoNeT16HXlCDXoiLXqSDXodee15kg16nXntei15XXnw!5e0!3m2!1siw!2sfr!4v1523278282217" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input name="name" type="text" class="form-control" placeholder="Name">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input name="email" type="text" class="form-control" placeholder="Email">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<textarea  name="msg" name="" class="form-control" id="" cols="30" rows="7" placeholder="Message"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group text-center">
										<input type="button" style="width:350px;" value="Send Message" class="btn btn-primary send">
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
<script type="text/javascript">

</script>
@endsection