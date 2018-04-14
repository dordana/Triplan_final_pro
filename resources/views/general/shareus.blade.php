@extends('layouts.app')

@section('content')
<style type="text/css">
    /** 
 * Note: The icon images used here are
 * hotlink protected and will not work
 * outside of Codepen.
 *
 * You can get the icons to host yourself 
 * here: http://simpleicons.org/
 */

.social-icons {
  max-width: 980px;
  margin: 0 auto;
   list-style-type: none;
}

.icon {
  float: left;
  position: relative;
  width: 19%;
  height: 0;
  margin: 1% 0.5%;
  padding-bottom: 19%;
}
@media all and (min-width: 640px) {
  .icon {
    width: 9%;
    padding-bottom: 9%;
  }
}
.icon:last-of-type {
  margin-right: 0;
}
.icon a {
  display: block;
  position: absolute;
  left: 0;
  width: 100%;
  height: 100%;
  border: 0;
  border-radius: 10px;
  background-color: #fff;
  background-size: 100%;
  background-repeat: no-repeat;
  background-position: center center;
  transition: all .2s ease-out;
}
.icon a:hover {
  background-color: #222;
  background-size: 0%;
  transition: all .2s ease-out;
}

.icon__name {
  position: absolute;
  top: 50%;
  width: 100%;
  margin-top: -7px;
  color: #fff;
  font-size: 13px;
  text-align: center;
  transition: all .3s ease-out;
  opacity: 0;
  -webkit-filter: blur(25px);
          filter: blur(25px);
  -webkit-transform: translateZ(0);
          transform: translateZ(0);
  will-change: transform;
}
.icon:hover .icon__name {
  transition: all .3s ease-out;
  opacity: 1;
  -webkit-filter: blur(0);
          filter: blur(0);
}

.icon--facebook a {
  background-color: #3b5998;
  background-image: url("http://benhodgson.net/codepen/social/facebook-128.png");
}

.icon--twitter a {
  background-color: #00aced;
  background-image: url("http://benhodgson.net/codepen/social/twitter-128.png");
}

.icon--linkedin a {
  background-color: #007fb1;
  background-image: url("http://benhodgson.net/codepen/social/linkedin-128.png");
}

.icon--instagram a {
  background-color: #5c3d2e;
  background-image: url("http://benhodgson.net/codepen/social/instagram-128.png");
}

.icon--flickr a {
  background-color: #c9317d;
  background-image: url("http://benhodgson.net/codepen/social/flickr-128.png");
}

.icon--spotify a {
  background-color: #80b719;
  background-image: url("http://benhodgson.net/codepen/social/spotify-128.png");
}

.icon--soundcloud a {
  background-color: #f60;
  background-image: url("http://benhodgson.net/codepen/social/soundcloud-128.png");
}

.icon--lastfm a {
  background-color: #d51007;
  background-image: url("http://benhodgson.net/codepen/social/lastfm-128.png");
}

.icon--kickstarter a {
  background-color: #87c442;
  background-image: url("http://benhodgson.net/codepen/social/kickstarter-128.png");
}

.icon--github a {
  background-color: #4183c4;
  background-image: url("http://benhodgson.net/codepen/social/github-128.png");
}
</style>
<p id="pageName" hidden >General</p>
	<div id="fh5co-contact" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Share Us</h3>
					</div>
				</div>
				<div class="row">
                <ul class="social-icons">
                  <li class="icon icon--facebook">
                    <a href="http://www.facebook.com/sharer.php?u=http://triplan1-dordana1191.c9users.io/">
                      <span class="icon__name">Facebook</span>
                    </a>
                  </li>
                  <li class="icon icon--twitter">
                    <a href="http://twitter.com/share?text=Triplan&url=http://triplan1-dordana1191.c9users.io/">
                      <span class="icon__name">Twitter</span>
                    </a>
                  </li>
                  <li class="icon icon--linkedin">
                    <a href="#">
                      <span class="icon__name">LinkedIn</span>
                    </a>
                  </li>
                  <li class="icon icon--instagram">
                    <a href="#">
                      <span class="icon__name">Instagram</span>
                    </a>
                  </li>
                  <li class="icon icon--flickr">
                    <a href="#">
                      <span class="icon__name">Flickr</span>
                    </a>
                  </li>
                  <li class="icon icon--spotify">
                    <a href="#">
                      <span class="icon__name">Spotify</span>
                    </a>
                  </li>
                  <li class="icon icon--soundcloud">
                    <a href="#">
                      <span class="icon__name">Soundcloud</span>
                    </a>
                  </li>
                  <li class="icon icon--lastfm">
                    <a href="#">
                      <span class="icon__name">Last.fm</span>
                    </a>
                  </li>
                  <li class="icon icon--kickstarter">
                    <a href="#">
                      <span class="icon__name">Kickstarter</span>
                    </a>
                  </li>
                  <li class="icon icon--github">
                    <a href="#">
                      <span class="icon__name">GitHub</span>
                    </a>
                  </li>
                </ul>
                </div>
        </div>
</div>
@endsection