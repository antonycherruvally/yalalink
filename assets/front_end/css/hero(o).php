/**{
	margin: 0;
	padding: 0;
}
body{
 	font-family: 'Open Sans', sans-serif;
 	color: #484848;
 	padding: 0;
    margin: 0;
    font-weight: 400;
    line-height: 1.5;
    background: #fff;
    -webkit-font-smoothing: antialiased;
    background-color: #ffffff;
    -moz-osx-font-smoothing: grayscale;
}
::selection {
    background: #654e95;
    color: white;
}
a {
    color: #654e95;
}
a:hover {
    color: #654e95;
}
ul {
    padding: 0;
    margin: 0;
}
ul, ol {
    list-style: none;
}
a:hover , a:focus{
	text-decoration:none !important;
}
h1, h2, h3, h4, h5, h6 {
    font-family: "Open Sans",sans-serif;
    font-weight: 600;
    font-style: normal;
    color: inherit;
    text-rendering: optimizeLegibility;
    margin-top: 0;
    margin-bottom: .5rem;
    line-height: 1.4;
}
.p-l-0{
    padding-left: 0 !important;
}
.p-r-0{
    padding-right: 0;
}
.o-h{
    overflow: hidden;
}
.adsbygoogle{
    text-align: center;
}
.no-mar-row{
    margin-right: 0;
    margin-left: 0;
}
.pos-center{
    margin: 0 auto !important;
}
.hero-container{
    max-width: 1250px;
}
.navbar-white{
	background: #ffffff;
    padding: 0;
}
.hero-bg-img{
	background-position: 50% 50%;
	background-repeat: no-repeat;
}
.hero-logo{
    height:90px;
    background-size: 260px;
    background-image: url(../images/logo-WEB.png);
    width: 260px;
    -webkit-transition: 0.2s ease-in-out;
    -o-transition: 0.2s ease-in-out;
    transition: 0.2s ease-in-out;
    padding: 0;
    background-repeat: no-repeat;
    display: inline-block;
    margin-left: -15px;
    background-position: 50% 50%;
    position: relative;
}
.hero-logo .ripple-container{display: none;}
.fixed-top {
    padding-left: 0;
    padding-right: 0;
    padding-top: 0;
    box-shadow: 0 0 4px rgba(0,0,0,0);
    transform: translate3d(0, 0, 0);
    padding-bottom:0px;
}
.sticky-top .hero {
    width: 60px;
    height: 60px;
    background-size: 60px;
}
.place-ad-wrap{
    display: inline-block;
    float: left;
    //*margin-top: 1px;*//
/*}
.top-bar{
    width: 100%;
    height: 36px;
    float: left;
    position: relative;
}
.top-bar ul{
    list-style-type: none;
    padding: 0px;
    margin-left: 14px;
    float: left;
    margin-bottom: 0px;  
}
#fixed-social{
    position: fixed;
    top: 50%;
    left: 0;
    background-color: #4fc3c5;
    width:43px;
    text-align: center;
    padding-top: 8px;
    padding-bottom: 0px;
    margin: 0;
    z-index: 1;
    margin-top: -80px;
}
.social_icons{
   /* width: auto;
    display: inline-block;//*/
/*}
.social_icons li:first-child{
   
}
.social_icons li {
   /* float: left;
    margin: 7px 0px 7px 6px;
    cursor: pointer;*///
    /*cursor: pointer;
    display: inline-block;
    margin: 0 auto;
    position: relative;
    left: -2px;
    margin-bottom: 2px;
}
.social_icons li a {
    float: left;
    width: 100%;
    text-decoration: none;
    text-align: center;
    position: relative;
    border: 1px solid #ffffff;
    box-sizing: border-box;
    border-radius: 50px;
    transition: all ease .5s;
    padding: 14px;
}
.social_icons li a:hover{
    background: #FF9800;
    border: 1px solid #f99c14;
}
.social_icons li a:hover i{
    color: #ffffff;
}
.social_icons li a i {
    color: #ffffff;
    font-size: 16px;
    transition: all ease .5s;
    position: absolute;
    top: 6px;
    bottom: 0px;
    left: 0px;
    right: 0px;
}
.header-top{
    padding: 4px 0;
    /*overflow: hidden;/*/
    /*border-bottom:3px solid rgba(100,78,151,1);
}
.logo-sec{
    margin-top: 6.4px;
    border-bottom:3px solid rgba(100,78,151,1);
}
.logo-sec-add{
    /*width:50%;*//
    /*display: inline-block;
    float: right;
    margin-top:0;
    position: relative;
}
.logo-sec-add img{
    max-width: 100%;
    height: auto;
}
.pro-image{
    width: 34px;
    object-fit: contain;
    height: 1.37rem;
}
.logged-avathar.dropdown-toggle:after{display: none;}
.logged-angle i{
    position: relative;
    font-size: 19px !important;
    float: right !important;
    margin-right: 0px !important;
    margin-left: 5px;
}
.profile-open{
    padding: .5rem .8em;
    min-width: 13rem;
}
.content-info .hero a{
    font-size: 14px;
    color: #484848;
    font-weight: 600;
}
.content-info .divider{
    border-bottom: 1px solid #eaeaec;
    margin-top: 3px;
}
.content-info .info-mail{
    font-size: 12px;
    font-weight: 400;
    color: #94969f;
    display: block;
}
.info-sections{
    margin-top: 5px;
}
.info-sections a{
    display: inline-block;
    font-size: 13px;
    width: 100%;
    font-weight: 400;
    color: #484848;
}
.acc-actions a{
    color: #7e818c;
}
.no-msg-result{
    margin-top: 25px;
}
.no-msg-result i{
    font-size: 69px;
    color: #654e95;
}
.no-msg-result .msg{
    font-size: 16px;
}
.no-msg-result .text-muted{
    font-size: 13px;
}
.filter-left form{
    width: 100%;
}
.country-sec{
    width: auto;
    float: left;
}
 .tooltip-inner {
    background-color: #644e97;
    opacity: 1;
    font-size: 11px;
}
.tooltip.bs-tooltip-auto[x-placement^=bottom] .arrow::before, .tooltip.bs-tooltip-bottom .arrow::before{
    border-bottom-color: #644e97;
}
/*.tooltip.bs-tooltip-auto[x-placement^=right] .arrow::before, .tooltip.bs-tooltip-right .arrow::before{
    border-right-color: #644e97;
}*/
.country-sec  li {
    float: left;
    margin: 7px 0px 7px 6px;
    cursor: pointer;
    position: relative;
}
.country-sec li:first-child{
    margin-left: 0;
}
.country-sec li a{
    width: 30px;
    height: 30px;
    display: inline-block;
    vertical-align: middle;
}
.country-sec li .country-name{
    width: 100%;
    display: inline-block;
    font-size: 11px;
    position: absolute;
    left: 0;
    bottom: -18px;
    text-align: center;
    right: 0;
    color: #464646;
    opacity: 1;
    transition: all ease-in-out 0.1s;
}
/*.country-sec li:hover .country-name{
     opacity: 0;
}*/
.country-sec li a.map-ico{
    height: 36px;
    background-size: 29px;
    width: 30px;
    background-position: 50% 50%;
    background-repeat: no-repeat;
}
.country-sec li:hover a{
     -webkit-transform: translateY(-4px);
    transform: translateY(-4px);
}
.uae-flag{
    background-image: url(../images/icon/uae.png);
}
.oman-flag{
    background-image: url(../images/icon/oman.png);
}
.saudi-flag{
    background-image: url(../images/icon/saudi.png);
}
.kuwait-flag{
    background-image: url(../images/icon/kuwait.png);
}
.bahrain-flag{
    background-image: url(../images/icon/bahrain.png);
}
.india-flag{
    background-image: url(../images/icon/india.png);
}
.philu-flag{
    background-image: url(../images/icon/philippines.png);
}
.egypt-flag{
    background-image: url(../images/icon/egypt.png);
}
.bounce-ani{
  -webkit-transform: translateZ(0);
    transform: translateZ(0);
    -webkit-transition-duration: 0.3s;
    transition-duration: 0.3s;
    -webkit-transition-property: transform;
    transition-property: transform;
    -webkit-transition-timing-function: ease-out;
    transition-timing-function: ease-out;  
}
.cat-wrap ul .row li .eng-txt{
    width: 100%;
    display: inline-block;
    /*font-size: 14px;*/
    font-size: 13px;
    font-weight: 600;
    position: relative;
    top: -11px;
    color: #333;
}
.cat-wrap ul .row li .cat-txt{
    top: 5px;
}
.cat-wrap ul .row li .cat-ar{
    font-size:13px;
    font-weight:bolder;
    width: 100%;
    display: inline-block;
    position: relative;
    top: -14px;
    color: #333;
}
.cat-icon{
    height: 84px;
    background-size: 120px;
    width: 120px;
    display: inline-block;
    top: 5px;
    position: relative;
}*/
.real-estate-ico{
    background-image: url(../images/cat/REAL-ESTATE.png);
    background-size:67px;
    width:67px;
}
.job-ico{
     background-image: url(../images/cat/JOBS.png);
     background-size:86px;
     width:86px;
}
.auto-ico{
     background-image: url(../images/cat/AUTO.png);
     /*background-size: 102px;
     width: 102px;*/
     background-size: 80px;
    width: 80px;
}
.classi-ico{
    background-image: url(../images/cat/CLASSIFIEDS.png);
    /*background-size:98px;*/
    background-size:81px;
    width:81px;
}
.hm-ico{
    background-image: url(../images/cat/HOUSE-MAID.png);
    background-size:76px;
    width:76px;
}
.phone-ico{
    background-image: url(../images/cat/PHONE.png);
    background-size:96px;
    width:96px;
}
.electro-ico{
    background-image: url(../images/cat/ELECTRONICS.png);
    background-size:72px;
    width:72px;
}
.computer-ico{
    background-image: url(../images/cat/COMPUTER.png);
    background-size: 67px;
    width: 67px;
    top: -1px;
}
.edu-ico{
    background-image: url(../images/cat/EDUCATION.png);
    background-size:69px;
    width:69px;
    /*top: 3.2px;*/
}
.ss-ico{
    background-image: url(../images/cat/STOCK.png);
    background-size:85px;
    width:85px;
    /*top: 2.2px;*/
}
.services-ico{
    background-image: url(../images/cat/SERVICES.png);
    background-size:74px;
    width:74px;
}
.commercial-ico{
    background-image: url(../images/cat/commer.png);
    background-size:81px;
    width:81px;
}
.villa-ico{
    background-image: url(../images/cat/villas.png);
    background-size:82px;
    width:82px;
}
.homei-ico{
    background-image: url(../images/cat/home-impro.png);
    background-size:75px;
    width:75px;
}
.construct-ico{
    background-image: url(../images/cat/CONSTRUCTION.png);
   /* background-size:81px;*/
    background-size:69px;
    width:69px;
}
.apart-ico{
    background-image: url(../images/cat/appartment.png);
    background-size:84px;
    width:84px;
}
.vip-ico{
    background-image: url(../images/cat/numberplate.png);
    background-size:78px;
    width:78px;
}
.boat-ico{
    background-image: url(../images/cat/boat.png);
    background-size:68px;
    width:68px;
}
.truck-ico{
    background-image: url(../images/cat/truck.png);
    background-size: 89px;
    width: 89px;
    /* background-position: initial; */
    top: 11px;
}
.healthcare-ico{
   background-image: url(../images/cat/healthcare.png);
   background-size:79px;
   width:79px;
}
.womenbeauty-ico{
   background-image: url(../images/cat/women-beauty.png);
   background-size:79px;
   width:79px;
}

.place-ad-wrap:hover i, .place-ad-wrap:focus i, .place-ad-wrap:active i ,.reg-button:hover i,.reg-button:focus i, .reg-button:active i
{
    -webkit-transform: translateY(-4px);
    transform: translateY(-4px);
}
.icon-btn:hover i, .place-ad-wrap:focus i, .place-ad-wrap:active i{
    -webkit-transform: translateY(-4px);
    transform: translateY(-4px);
}
.icon-btn:hover img, .place-ad-wrap:focus img, .place-ad-wrap:active img{
    -webkit-transform: translateY(-4px);
    transform: translateY(-4px);
}
.free-reg{
    margin-top:15px;
}
.free-reg section .head{
    padding: 10px;
    background-color: #4fc3c5;
    border-radius: .25em .25em 0 0;
}
.free-reg .box-typical{
    margin-top: 0;
    box-shadow: none;
    border: none;
}
.free-reg .box-typical .head span{
    width: auto;
    display: inline-block;
    color: #ffffff;
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
}
.free-reg section .head span:nth-child(2){
    float: right;
}
.free-ico{
    height: 94px;
    background-size: 150px;
    width: 130px;
    background-position: 50% 50%;
    background-repeat: no-repeat;
    background-image: url(../images/icon/Free.png);
    left: 50%;
    top: -23px;
    position: absolute;
    transform: rotate(-32deg);
    margin-left: -60px;
    z-index: 1
}
.reg-box{
    padding-left: 8px;
}
.free-reg .content{
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.05);
    /*border: 1px solid #eee;*/
    padding: 10px;
    padding-left: 13px;
    overflow: hidden;
    background-color: #f5f5f5;
    padding-bottom: 0;
}
.free-reg .content .desc{
    float: left;
    display: inline-block;
}
/*.free-reg .content .desc:first-child{
    border-right: 1px solid #eee;
}*/
.free-reg .content .desc .point:first-child{
    padding-top: 0;
}
.free-reg .content .desc .point:first-child i{
    top: 0;
}
.free-reg .content .desc .point{
    width: 100%;
    display: inline-block;
    font-size: 13px;
    color: #484848;
    line-height: 19px;
    padding-left: 22px;
    position: relative;
    /*border-bottom: 1px solid #eee;*/
    padding-bottom: 5px;
    padding-top: 5px;
}
.free-reg .content .desc .point:nth-child(2){
    padding-bottom: 0;
}
.free-reg .content .desc .point i{
    position: absolute;
    left: 0;
    top: 6px;
    font-size: 17px;
    color: #28b581;
}
.desc.ar-lang i{
    right: 0;
}
.desc.ar-lang .point{
    padding-left: 0;
    padding-right: 23px;
}
.reg-button{
    padding:7.9px 22.5px !important;
    /*margin: 0 auto;
    display: table !important;*/
    float: none !important;
    position: absolute;
    margin-left: -98.315px;
    left: 50%;
    /*top: 0;*/
    /*margin-top: 15px;*/
    transition: all ease-in-out 0.3s;
    top: -8px;
}
.reg-button span{
    width: auto !important;
    vertical-align: middle;
    line-height: 22px;
        margin-right: 5px;
}
.reg-button i{
    position: relative !important;
    right: 0 !important;
    float: right;
    top: 0 !important;
}
/*.reg-button:hover,.reg-button:focus,reg-button:active{
    opacity: 0.9;
}*/
.index-bottom-add{
    height:auto;
    /*width: 100%;*/
}
.no-padding{
   padding: 0 !important; 
}
.m-t-0{
    margin-top: 0 !important;
}
.fade-in{
  -webkit-animation: fade-in 2s ease;
  -moz-animation: fade-in ease-in-out 2s both;
  -ms-animation: fade-in ease-in-out 2s both;
  -o-animation: fade-in ease-in-out 2s both;
  animation: fade-in 2s ease;
  visibility: visible;
  -webkit-backface-visibility: hidden;
}
@-webkit-keyframes fade-in{0%{opacity:0;} 100%{opacity:1;}}
@-moz-keyframes fade-in{0%{opacity:0} 100%{opacity:1}}
@-o-keyframes fade-in{0%{opacity:0} 100%{opacity:1}}
@keyframes fade-in{0%{opacity:0} 100%{opacity:1}}




.nav-bar-title{
	/*width: 55%;*/
    margin-top:9.5px;
}
.nav-bar-title .navbar-nav{
    display: block !important;
}
.nav-bar-title ul li {
    display: inline-block;
    padding: 0 0.1666rem;
   /* padding: 0 0.21rem;*/
    position: relative;
    float: left;
    width: auto;
   /* margin-bottom: 6px;*/
}
.nav-bar-title ul li:first-child{
    padding-left: 0;
}
.inner-container{
   width: 1214px;
    /* margin: 0 auto; */
    /* display: table; */
    position: absolute;
    left: 50%;
    right: 0;
    margin-left: -607px;
    /* top: 0; */
    margin-top: 10px;
}
.nav-bar-title .navbar-nav .nav-link{
	font-size: 12px;
	font-weight: 600;
	color: #484848;
	/*padding:2.375rem .3125rem 2.25rem;*/
	transition:all 0.3s ease-in-out; 
    border: 1px solid #eee;
    border-radius: 4px;
    padding-right: .5rem;
    padding-left: .5rem;
    padding: .5rem;
}
.nav-bar-title .navbar-nav .nav-link.active{
    color: #ffffff;
    background-color: #654e95;
}
.nav-bar-title .navbar-nav .nav-link:hover{
    color: #ffffff;
    background-color: #654e95;
}
.top-bar-right {
    /*width: 44.1%;*/
    width:32%;
    display: inline-block;
}
.hero-button {
    display: inline-block;
    text-align: center;
    line-height: 1;
    cursor: pointer;
    -webkit-appearance: none;
    transition: background-color 0.25s ease-out, color 0.25s ease-out;
    vertical-align: middle;
    border: 1px solid transparent;
    border-radius:8px;
    padding: 0.85em 1em;
   /* margin: 0 0 1rem 0;*/
    font-size: 0.9rem;
    background-color: #60CDF6;
    color: #fff;
    font-weight: 400;
}
.top-head-right{
    float: right;
    margin-top: 5.5px;
}
.btn-place-ad {
    /*padding: .625rem 1.7rem !important;*/
    font-size: .8125rem;
    /* height: 2.25rem; */
    float: left;
    border: none;
    transition: background 0.3s linear;
    background: #FF9800;
    line-height: 15px;
    text-transform: uppercase;
    font-weight: 600;
    /*margin-top: 2px;*/
    padding: 3.4px 1px;
    border-radius: .25rem;
    position: relative;
}
.btn-place-ad i{
    font-size:21px;
    color: #ffffff;
    position: absolute;
    right: 17px;
    top: 10px;
}
.ar-txt{
   /*font-family: 'GE_Dinar';*/
   font-weight: 600;
}
.ar-lang{
    text-align: right;
}
.add-ar{
    font-size: 16px;
    color: #ffffff
}
.typical-box-ar{
    font-size: 15px;
    color: #ffffff;
    width: auto;
    display: inline-block;
}
.btn-place-ad span{
    width:100%;
    display: inline-block;
}
.reg-button{
    background: #4fc3c5;
}
.reg-button:hover,.reg-button:focus,.reg-button:active{
     opacity: 0.9;
     background: #4fc3c5 !important;
}
.btn-place-ad:hover,.btn-place-ad:focus,.btn-place-ad:active{
	 background: #FF9800;
     color: #ffffff;
}
.top-head-right .navbar-form{
    display: inline-block;
    margin-right:8px;
    /*margin-top: 3px;*/
    float: left;
}
.top-head-right .navbar-form .input-group{
    margin-right: 40px;
}
.top-head-right .navbar-form .input-group input[type=text]{
    font-size: 13px;
}
.top-head-right .navbar-form .input-group input[type=text]:focus {
    color: #495057;
    background-color: #fff;
    border-color: #eee;
    outline: 0;
    box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;
}
.header-login {
    position: relative;
    margin: 0;
    color: #ffffff;
    cursor: pointer;
    font-size: 13px;
    font-weight: 700;
    padding: 0 10px;
    transition: all .3s ease-in-out;
    display: inline-block;
    margin-left: 8px;
    background: #4fc3c5;
    padding: 8px 5px;
    border-radius: 4px;
    float: left;
    /*margin-top: 3px;*/
}
.login-link {
    text-decoration: none;
    color: inherit;
    font-weight: 400;
    display: block;
    text-align: left;
    left: -2px;
    position: relative;
}
.login-link:hover{
    opacity: 0.9;
    color: #ffffff;
}
.login-link i{
    font-size: 22px;
    line-height: 21px;
    display: inline-block;
    float: left;
    margin-right: 5px;
    transition: all .3s ease-in-out;
}
.top-head-right .navbar-form button{
    border-radius: 0px 4px 4px 0px;
    background: #644e97;
    color: #ffffff;
}
.carousel-control-next-icon, .carousel-control-prev-icon {
    width: 40px;
    height: 40px;
    }
.carousel-control-next-icon{
    background:url(../images/arrow-r.png) no-repeat center;
    background-size: 45%;
}
.carousel-control-prev-icon{
    background:url(../images/arrow-l.png) no-repeat center;
    background-size: 45%;
}
.mobile-banner{
    display: none;
}
.slider-sec{
    margin-top: 3.5px;
    padding-bottom: 40px;
    overflow: hidden;
}
.no-padd{
    padding: 0;
}
.m-t-15{
    margin-top: 15px;
}
.uppercase{
	text-transform: uppercase;
}
.top-bar-right .ln-profile {
    height: 2.375rem;
    display: inline-block;
    border: 1px solid #60CDF6;
    border-radius: 1.75rem;
    font-size: .8125rem;
    float: right;
}
.sign{
    padding: .6rem 0.5rem !important;
}
.sign .name {
    line-height: 20px;
    color: #ffffff;
    max-width: 7.5rem;
    overflow: hidden;
    white-space: nowrap;
    display: inline-block;
    text-overflow: ellipsis;
    vertical-align: middle;
    float: left;
    text-indent: 4px;
}
.top-bar-right .icon-login {
    margin-left: 0;
    -ms-flex-align: center;
    align-items: center;
    display: -ms-inline-flex;
    display: -ms-inline-flexbox;
    display: inline-flex;
    font-size: 37px;
    color: #484848;
    /* top: -2px; */
    left: 7px;
    position: relative;
    /* float: right; */
    line-height: 19px;
}
.home-banner {
    /*background: url(../images/bg-banner.jpg) no-repeat;
    background-size: 100%;*/
    background:url(../images/banner.jpg) no-repeat 50% 100%;
    background-size:cover;
    margin-top: 96px;
    width: 100%;
    min-height: 20.5625rem;
    display: inline-block;
}
.home-container {
    /*padding: 3.75rem 3.125rem 6.25rem;*/
       /* padding: 0.75rem 1.125rem 1.25rem;*/
}
.home-container .verticals {
    width: 56.25rem;
    text-align: center;
    margin: auto;
}
.home-container .home-header {
    margin-top: 1.5625rem;
}
.home-container .home-header h2 {
    font-size: 1.65rem;
    font-weight: 700;
    background: linear-gradient(to right, #27aead 0%, #25a9dd 100%);
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
        padding-bottom: 15px;
}
.home-container .home-header h2 span{
	background: linear-gradient(to left, #28b09b 0%, #29b477 100%);
	font-size: 3.65rem;
    font-weight: 700;
    -webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
}
.icons-media-container {
    display: flex;
    justify-content: center;
    -webkit-justify-content: center;
    flex-direction: row;
    -webkit-flex-direction: row;
    flex-wrap: wrap;
    -webkit-flex-wrap: wrap;
}
.home-container .verticals a {
    display: inline-block;
    margin: 1rem;
    vertical-align: top;
}
.home-container .vertical-icon {
    width: 8.75rem;
    height: 8.75rem;
    padding: 1.5rem;
    border-radius: 50%;
    background-color: #F7F7F9;
    transition: background-color 0.5s ease;
    display: inline-block;
}
.home-container .vertical-icon img {
    width: 5.375rem;
    height: 5.375rem;
}
.home-container .verticals .title {
    width: 8.75rem;
    display: block;
    color: #484848;
    margin-top: .75rem;
    text-align: center;
}
.full-wrap{
    width: 100%;
    position: relative;
    height: auto;
}
.split-section{
    /*background-color: #F6F6F6;*/
}
.cat-wrap img{
   /*width: 100%;*/
}

.cat-add img{
    width: 100%;
    margin-top: 0px;
    margin-bottom: 0.55em;
}
.add{
    text-align: right;
    padding: 0;
    margin: 0;
    margin-left: 40px;
    padding-bottom: 30px;
}
.cat-wrap .box {
    cursor: pointer;
    position: relative;
    overflow: hidden;
}
.mask {
    width: 100%;
    height: 100%;
    opacity: .8;
    filter: alpha(opacity=80);
    top: 0;
    left: 0;
    background-size: cover;
    background-position: 20% 50%;
    -webkit-transition: -webkit-transform 1s linear;
    -moz-transition: -moz-transform 1s linear;
    -ms-transition: -ms-transform 1s linear;
    -o-transition: -o-transform 1s linear;
    transition: transform 1s linear;
}
.heading {
    text-align: center;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    position: relative;
}
.heading i {
    background: 0 0;
    border-radius: 50%;
    border: 1px solid #fff;
    display: block;
    font-size: 25px;
    height: 60px;
    line-height: 60px;
    margin: auto auto 10px;
    width: 60px;
    -webkit-transition: all .3s;
    transition: all .3s;
}
.menu>div h2 {
    font-size: 35px;
    font-weight: 100;
    margin: 0;
    letter-spacing: 1px;
    color: #fff;
    text-align: center;
}
.add-wrap{
    display: inline-block;
    margin-top: 23px;
}
.add-wrap .add-sec{
    border: 1px solid #eee;
}
.add-sec img{
    max-width: 100%;
    object-fit: contain;
    -webkit-box-shadow: 0 0 4px 1px rgba(204,204,204,0.5);
    -moz-box-shadow: 0 0 4px 1px rgba(204,204,204,0.5);
    box-shadow: 0 0 4px 1px rgba(204,204,204,0.5);
    border-radius: 4px;
}
.pull-left{
    float: left;
}
.pull-right{
    float: right;
}
.cat-wrap{
    margin-top:0px;
}
.cat-wrap ul .row li{
  /* width:24.18%;*/
    width: 48.855%;
   float: left;
   display: inline-block;
   border: 1px solid #eee;
   box-sizing: border-box;
    border-radius: .25rem; 
    text-align: center;
    vertical-align: middle; 
    margin-left: 0.5em;
    margin-bottom: 0.5em;
    /*min-height: 180px;*/
}
.cat-wrap ul .row li:first-child{
    margin-left: 0;
}
.cat-wrap ul .row li:nth-child(2n+1){
    margin-left: 0;
}
.cat-switch-btn a{
    width: 50%;
    padding: 5px;
    background: #644e97;
    border-right: 1px solid #ffffff;
    color: #ffffff;
    font-size: 11px;
    display: inline-block;
    float: left;
    transition: all ease-in-out 0.3s;
}
.cat-switch-btn a:hover{
    opacity: 0.9;
}
.cat-switch-btn a:nth-child(2){
    border: none;
}
.m-l-0{margin-left: 0 !important;}
.hero-radius{
    border-radius: .25rem;
}
.indexcolleft .box-typical:first-child{
    margin-top: 0;
}
.box-typical{
    width: 100%;
    position: relative;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.05);
    border: 1px solid #eee;
    background: rgba(255,255,255,1);
    margin-top: 15px;
}
.box-typical .box-typical-header{
    display: inline-block;
    border-top: 4px solid #4fc3c5;
    width: 100%;
    background: #4fc3c5;
    display: inline-block;
    font-size: 13px;
    color: #ffffff;
    font-weight: 600;
    padding: 7px 7px;
    border-radius: .25em .25em 0 0;
    padding-top: 3px;
    text-indent: 3px;
}
.box-typical .wrapper{
    width: 95%;
    margin: 0 auto;
}
.list-item-full-width{
    width: 100% !important;
}
.list-item-full-width .tbl-cell{
    display: inline-block !important;
    width: 100%;
}
.list-item-full-width .tbl-cell img{
    max-width: 100%;
    height: 335px;
    object-fit: cover;
    width: 100%;
}
.list-item-full-width .item-row .content{
    width: 100% !important;
    margin-top: 11px;
}
.list-item {
    padding: 0 10px 12px;
    padding-top: 10px;
    padding-bottom: 10px;
    background-color:rgba(251, 252, 253,1);
    border-bottom: 1px solid #eee;
    -webkit-transition: all ease-in-out 0.3s;
    width: 49.711%;
    display: inline-block;
}
.list-item:hover{
    background-color:rgba(251, 252, 253,1);
}
.item-row {
    display: table;
    width: 100%;
    border-collapse: collapse;
    font-size: .8125rem;
}
.tbl-row {
    display: table-row;
}
.item-row .tbl-cell.tbl-cell-photo {
    width: 42px;
    padding-right: 10px;
    float: left;
    display: inline-block;
    padding: 0;
}
.tbl-cell {
    display: table-cell;
    vertical-align: middle;
}
.item-row .tbl-cell.tbl-cell-photo img {
    display: block;
    width:80px;
    height:80px;
    object-fit: cover;
}
.item-row .content {
    font-weight: 400;
    color: #484848;
    width:71%;
    float: right;
}
.item-row .content .head{
    width: 100%;
    display: inline-block;
    font-size: 13px;
    font-weight:700;
    color: #333;
    float: left;
    display: inline-block;
}
.item-row .content .head span{
    color: #fa424a;
    width: 100%;
    display: inline-block;
    font-size: 15px;
    margin-top: 2px;
}
.item-row .content p{
    font-size: 12px;
    line-height: 18px;
    margin: 0;
    margin-top: 2px;
    display:block;
}
.item-row .content p em{
    font-size: 11px;
    color: #a2a2a2;
    font-style: normal;
    display: inline-block;
    width: 100%;
    float: right;
    text-align: right;
    margin-top: 4px;
}
.sticky-bg {
   box-shadow: 0 0 4px rgba(0,0,0,0.1);
    padding-bottom: 9.5px;
}
.hero-header{
    background-color: #ffffff;
}
#sticky-hero{
    padding-top: 14.1rem;
}
.full-click{
    width: 100%;
    height: 100%;
    display: inline-block;
}
.filter-left li{
    border: none;
    /*padding: .75rem 1.55rem;*/
    padding: .75rem 1.2rem;
    padding-top: 0;
}
.row-margin{
    margin-top: 8px;
}
.searchbox input[type="text"]{
    font-size: 13px;
}
.filter-btn{
    color: #fff;
    background-color: #FF9800;
    border-color: #FF9800;
    width: 95%;
    margin: 0 auto;
    margin-bottom: 8px;
    font-weight: 600;
    position: relative;
    overflow: hidden;
    text-transform: unset;
}
.filter-btn:hover,.filter-btn:active,.filter-btn:focus{
    color: rgba(255, 255, 255, 0.87);
    background-color: hsl(36, 96%, 54%);
}
.accordion-toggle:after {
    font-family: 'FontAwesome';
    content: "\f078";    
    float: right;
    vertical-align: middle;
    line-height: 28px;
    color: #4fc3c5;
}
.accordion-opened .accordion-toggle:after {    
    content: "\f054";    
}
.list-sec-add{
    width: 100%;
    margin-bottom: 16px;
    margin-top: 8px;
}
.list-pagei{
    margin-bottom: 20px;
}
 .list-pagei:first-child .page-item {
    width:auto;
 }
.list-pagei .page-item .page-link{
    font-size: 12px;
    color: #644d95;
}
.list-pagei .upload-more{
    margin-right: 8px;
}
.list-pagei .upload-more a{
    background-color: #FF9800;
    border-radius: 4px;
    color: #ffffff !important;
    border: 1px solid #f79607;
    transition: all ease-in-out 0.3s;
}
.upload-more a{
    padding-right:.55rem !important;
    padding-left:.55rem !important;
}
.list-pagei .upload-more a:hover,.list-pagei .upload-more a:active{
    opacity: 0.9;
}
.list-pagei .upload-more a i{
    font-size: 15px;
    vertical-align: middle;
    margin-left: 2px;
}
.list-pagination{
    margin: 0 auto;
    display: table;
}
.page-link:focus {
    box-shadow: 0 0 0 0.1rem rgba(101, 78, 149,0.3);
}
.link-radius{
    /*border-radius: 4px 0px 0px 4px;*/
}
/*.filter-right-list{
    margin-top: 27px;
}*/
.about-content{
    font-size: 13px;
    line-height: 21px;
    margin-top: 5px;
    margin-bottom: 0.9em;
}
.about-content a{
    font-size: 13px;
    font-weight: 600;
}
.email-to-modal .modal-title{
    font-size:14px; 
}
.email-to-modal .modal-title i{
    margin-right: 4px;
    color: #FF9800;
    font-size: 16px;
}
.email-to-modal .modal-content .modal-header {
    padding: 11px 24px 0;
    padding-bottom: 5px;
    border-bottom: 1px solid #e9ecef;
}
.email-to-modal .modal-content .modal-body {
    padding: 0px 24px 0px;
}
.email-to-modal .modal-content .modal-footer {
    padding: 8px 16px 16px 0px;
    border-top: 0;
}
.mail-btn{
    padding: .35rem 1rem;
}
.about-content i{
    font-size: 25px;
    display: inline-block;
    vertical-align: middle;
    color: #644e97;
    top: -1px;
    position: relative;  
}
.btn.btn-link:before {
    float: right !important;
    font-family: FontAwesome;
    content:"\f106";
    color: #4fc3c5;
    font-weight: 500;
    font-size:23px;
}
.btn.btn-link.collapsed:before {
    float: right !important;
    content:"\f107";
}
.faq-box{
    margin-top: 14px;
}
.faq-box .card .card-body{
    font-size: 13px;
}
.faq-box .card{
    margin-bottom: 6px;
    box-shadow: none;
}
.faq-box .card .card-header {
    padding: 0.1rem;
}
.faq-box .card .btn{
    margin-bottom: 0;
    width: 100%;
    text-align: left;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
    line-height: 21px;
    padding-left: 9px;
}
.faq-box .card .btn:active:hover{
    background-color: hsla(0,0%,60%,0);
}
.edit-select-profile .select2-container{
    width: 100% !important;
}
#update-pills-home .bmd-label-static{
    left: 5px;
}
.edit-select-profile .select2-container--default .select2-selection--single{
    margin-top: 5px;
}
.t-c h4{
    font-size: 13px;
    color: #949494;
}
.t-c p span{
    font-size:13px;
    font-weight: bold;
    width: 100%;
    float: left;
    margin-bottom: 0.3em;
}
.t-c p{
    font-size: 13px;
    width: 100%;
    line-height: 22px;
}
.search-info h3{
    font-size: 15px;
}
.search-result{
    margin-top: 16px !important;
}
.search-info h3 i{
    display: inline-block;
    margin-right: 4px;
    color: #bec1c8;
    font-size: 18px;
}
.search-info h3 span{
    color: #878b94;
    font-weight: 400;
}
.p-p p{
    font-size: 13px;
    padding-left: 18px;
}
.p-p i{
    font-size: 11px;
    position: absolute;
    left: 0;
    top: 4px;
    color: #4fc3c5;
}
.advertising-form .nav{
    margin-top: 11px;
}
.advertising-form .tab-content{
    padding: 0 22px;
    border:1px solid #e9ecef;
    border-radius: 0px 4px 4px 4px;
    padding-bottom: 22px;
}
.advertising-form .firstsec-img{
}
.adv-clabel{
    color: rgba(0,0,0,.6);
    font-weight: 600;
    font-size: 0.8em;
    margin-right: 0.3em;
}
.size-check{
    margin-top: 0.8em;
}
.size-check .checkbox{
    width: auto;
    display: inline-block;
    margin-right: 0.5em;
    position: relative;
}
.size-check .checkbox .help-txt{
    font-weight: bold;
    color: #484848;
    font-size: 12px;
}
.adv-radius{
    border-radius: 0px 4px 0px 4px;
}
.duration-box{
    margin-top: 1em;
}
.d-check50{
    max-width: 48px;
    width: 100% !important;
}
.tariff-second-sec{
    padding: 0 15px;
}
.cheque-num{
    margin-top: -1.8em;
}
.tariff-first{
    border-right: 1px solid #eee;
}
.tariff-bottom{
    background: #f1f1f1;
    padding: 0 11px;
}
.tariff-bottom .tariff-co{
    font-size: 13px;
    font-weight: 600;
}
.tariff-btm-second{
    width: 100%;
    margin-top: -1em;
}
.tariff-bottom .form-control:focus{
     background-color:rgba(255,255,255,0); 
}
.t-tip{
    padding: 1px 2px;
    background: #29b57b;
    font-size: 10px;
    position: absolute;
    top:25px;
    left:0px;
    border-radius: 4px;
    color: #fff;
    text-align: center;
}
.tariff-head{
    font-size: 15px;
    font-weight: bold;
    width: 100%;
    flex-basis: auto;
}
.tariff-1row{
    margin-top: -15px;
}
.thariff-table{
    margin-bottom: 1em;
}
.thariff-table .table-content{
    margin-top: 8px;
}
.thariff-table .table-content .title{
    border: 1px solid #c3c3c3;
    box-sizing: border-box;
    background: #4fc3c5;
    font-size: 14px;
    font-weight: 600;
    padding: 5px;
    width: 100%;
}
.thariff-table .table-content .title span{
    width: 26px;
    height: 26px;
    border-radius: 50%;
    background-color: #ffffff;
    line-height: 26px;
    font-size: 13px;
    display: inline-block;
    text-align: center;
    margin-right: 2em;
    margin-left: 0.55em;
}
.thariff-table .table-content .title i{
    font-style: normal;
}
.thariff-table .table-content .table-row .cell{
    width: 19%;
    display:table-cell;
    font-size: 12px;
    padding: 8px 12px;
    margin-right: 2px;
    margin-top: 2px;
    background-color: #e5f6f6;
}
.thariff-table .table-content .table-row{
    width: 100%;
    margin-bottom: 3px;
}
.thariff-table .table-content .table-row .cell:last-child{
    margin-right: 0;
}
.thariff-table .table-content .table-row .cell .check{
    width: 1em;
    height: 1em;
    top: 2px;
    left: 2px;
}
.last-cell{
    padding-right: 8px !important;
}
.thariff-table .table-content .table-row .cell .check:before{
    margin-top: -5px;
    margin-left: 5px;
}
.thariff-table .table-content .table-row .cell label,.small-checkbox label{
    margin-bottom: 0;
    line-height: 0;
}
.thariff-table .table-content .table-row .cell .checkbox,.small-checkbox .checkbox{
    padding: 0;
    margin: 0;
    top: 4px;
    position: relative;
}
.cell .checkbox label .checkbox-decorator{
    top: -12px;
}
.cell-head{
    background-color: #bbe8e8 !important;
    font-weight: bold;
}
.featured-cat-label{
    font-size: 12px;
    font-weight: 600;
    color: #484848;
    line-height: 22px;
}
.small-checkbox .checkbox{
    width: 100%;
    float: left;
    margin-bottom: 0.4em;
}
footer .cutom-margin{
    position: relative;
    left: 4%;
}
.footer-bg{
    background: #333333;
	width: 100%;
}
.footer-logo{
	height: 101px;
    background-size: 188px;
    background-image: url(../images/logo-WEB.png);
    width: 195px;
}
.linkmedia-logo{
    height: 45px;
    background-size: 69px;
    background-image: url(../images/link-media.png);
    width: 71px;
    margin: 0 auto;
}
.hero-home{
    height: 45px;
    background-size: 51px;
    background-image: url(../images/icon/building.png);
    width: 50px;
    position: absolute;
    left: 36%;
    top: -21px;
}
.innerpage-wrap{
    margin-top:15px;
    /*border: 1px solid #eaeaec;
    border-radius: 4px;
    border-left-color: #4fc3c5;
    border-left-width: .25rem;
    padding: 11px;
    padding-left: 14px;
    padding-right: 14px;*/
    margin-bottom: 19px;
}
.inner-header-box {
    width: 100%;
    height: auto;
    position: relative;
}
.header-box-headerText {
    font-size: 20px;
    font-weight: 600;
    text-align: left;
    color: #484848;
}
.header-box-contentText {
    font-size: 14px;
    text-align: left;
    color: #94969f;
}
.contact-btn{
    width: 9em;
}
.innerpage-wrap .bmd-label-floating{
    font-size: 0.8em !important;
}
footer .footer-menu p{
    font-size: 11px;
    margin: 0;
    color: #ffffff;
}
.footer-menu .power{
    font-size: 12px;
    color: #4fc3c5 ;
    font-weight:600;
    padding-bottom: 8px;
    text-transform: uppercase;
}
footer .footer-menu p.media-address{
    margin-top: 8px;
}
.media-address a{
    color: #ffffff;
    transition: all ease-in-out 0.3s;
}
.media-address a:hover{
    opacity: 0.9;
}
footer .footer-menu p.media-address b{font-weight: 600;}
footer .footer-menu p.media-address b a{
    color: #ffffff;
}
footer .footer-menu li {
    display: block;
    padding-top: .1rem;
    padding-bottom: .1rem;
    width: 100%;
    display: inline-block;
}
footer .footer-menu li:hover i{
    border-color: #269c9e;
}
footer .footer-menu li a{
	color: #ffffff;
	font-size:11px;
    font-weight: 600;
    transition: all ease-in-out 0.3s;

}
footer .footer-menu li a:hover{
	color: #FF9800;
}
.copyright{
	padding-left:5px;
	color: #ffffff;
}
.social-icon-wrap a {
    font-size: .875rem;
    line-height: 1.5rem;
    font-weight: normal;
}
.social-icon-wrap a i{
	display: inline-block;
    font-size: 16px;
    color: #4fc3c5;
    float: right;
    line-height: 30px;
    width: 31px;
    height: 31px;
    border-radius: 50%;
    border: 1px solid #505050;
    box-sizing: border-box;
    text-align: center;
    margin-top: 4px;
    transition: all ease-in-out 0.3s;
}
.social-icon-wrap a span{
	vertical-align: middle;
    line-height: 38px;
    padding-right: 8px;
}
.footer-bg .sec-one{
    background-color: #ededed;
    border-top: 5px solid #333;
    padding-bottom: 10px;
}
.footer-bg .sec-one p{
    font-size: 11px;
    color: #333;
    font-weight: 600;
    margin: 0;
    position: relative;
}
.footer-bg .sec-one p i,footer .footer-menu p.media-address i{
    display: inline-block;
    font-size: 15px;
    color: #333;
    margin-right: 4px;
}
.copy-right{
    background-color: rgba(0,0,0,0.5);
    padding: 8px;
    font-size: 10px;
    color: #c4c4c4;
}
.copy-right p{
    margin: 0;
}
.copy-right p a{
    color: #4fc3c5;
}
.media-address i{
    color: #4fc3c5 !important;
}
.media-address i.fa-envelope-open{
    font-size: 12px !important;
}
.hero-mobilemenu i{
    font-size: 18px;
    color: #000;
    display: inline-block;
    vertical-align: middle;
}
.mobile-header{
    display: none;
}
.mobile-social{
    display: none;
}
/*.d-flex {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}*/
.healthcare-tabs li {
    width: 25% !important;
}
.listing-wrap .row .col{
    padding-left:0px;
    padding-right: 8px;
}
.healthcare-tabs .nav-link{
    padding: .282rem 0rem !important;
}
.listing-wrap{
   /* padding-left: 26px;*/
}
.listing-wrap .nav-tabs li{
    width: 50%;
}
.listing-wrap .col{
    margin-bottom:8px
}
.listing-wrap .tab-content{
    padding-right: 8px;
    margin-top: 8px;
}
.listing-wrap .nav-link {
    display: block;
    padding: .282rem 4rem;
    font-size: 14px;
    font-weight: 600;
    color: #333;
    text-align: center;
    /*border-color: #e9ecef #e9ecef #dee2e6;*/
    border: 1px solid #e9ecef;
}
.nav-item .link-radius{
    border-radius: 4px 4px 4px 0px;
}
.listing-wrap .nav-link.active {
    color: #ffffff;
    background-color: #664e96;
    border-color: #dee2e6 #dee2e6 #fff;
}
.advance-footer-btn{
    padding: 4.5px 7px;
    background: #eee;
    padding-bottom: 0;
}
.advance-footer-btn a{
    font-size: 13px;
    color: #333;
    font-weight: 600;
    vertical-align: middle;
    line-height: 25px;
}
.form-control:focus,.select2-search__field {
    color: #495057;
    background-color: #fff;
    border-color: #afa3c7;
    outline: 0;
    /*box-shadow: 0 0 0 0.1rem rgba(101, 78, 149,0.1);*/
}
.select2-container--default .select2-selection--single{
    border: 1px solid #ced4da;
}
.select-box-search label,.one-row-field label{
    font-size: 13px;
    width: 100%;
    font-weight:600;
}
.one-row-field label{
    padding-left: 15px;
}
.select-box-search select{
    width: 100% !important;
    font-size: 13px;
}
.select-box-search select option{
    font-size: 13px;
    color: #484848;
}
.select-box-search .dropdown-wrapper{
    width: 100%;
    display: block;
}
.select-box-search .select2-container{
    width: 100% !important;
    display: block !important;
}
.select-box-search .select2-container--default .select2-selection--single .select2-selection__rendered{
    font-size: 13px;
}
.select2-results__option{
    font-size: 12px;
}
/*.select2-results__options:hover{
    background-color: #000;

}*/
.select2-results__options li:hover{
     color: #ffffff !important;
     background-color: #654e95 !important;
 }
 .select2-results__option--highlighted[aria-selected]{background-color:#654e95 !important;color:white}
 .select2-search--dropdown .select2-search__field {
    padding: 3px;
    padding-left: 3px;
    font-size: 12px;
    border-color: #afa3c7 !important;
}
.select2-dropdown{
    z-index: 1;
}
.select2-selection__rendered:focus{

}
.list-subcategory .nav-tabs{
    border: 1px solid #e8e8e8;
    border-radius: 4px;
    background: #f4f4f4;
}
.list-subcategory .nav-tabs .nav-item{
    /*width: 20%;*/
    width: 16.666%;
    float: left;
    display: inline-block;
    font-size: 12px; 
}
.list-subcategory .nav-link {
   display: block;
   padding: 7.5px 0px;
   font-size: 12px;
   border-radius: 0px !important;
   border: none;
   border-right: 1px solid #d8d8d8;
   position: relative;
   font-weight: 700;
}

.list-subcategory .nav-link::before,.sublist-wrap .nav-link::before {
    content: '';
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
    border-bottom: 10px solid #4fc3c5;
    position: absolute;
    bottom: -10px;
    left: 50%;
    margin-left: -10px;
    opacity: 0;
    transition: opacity .2s 0 ease;
    transform: rotate(180deg);
}
.list-subcategory .nav-link.active,.sublist-wrap .nav-link.active {
    color: #ffffff;
    background-color: #4fc3c5;
    border-color: #4fc3c5 #4fc3c5 #4fc3c5;
}
.active-tabss {
    color: #ffffff !important;
    background-color: #4fc3c5;
    border-color: #4fc3c5 #4fc3c5 #4fc3c5;
}
.list-subcategory .nav-link.active:hover{
    border-color: #4fc3c5 #4fc3c5 #4fc3c5 !important;
}
.list-subcategory .nav-link.active::before,.sublist-wrap .nav-link.active-tabss::before{
    opacity: 1;
}
.new-used-switching{
    margin-top: 15px;
}
.realestate-sub li{
    width:25% !important;
}
/*.sublist-wrap li:first-child{
    width: 25% !important;
}*/
.realestate-sub li:last-child{
    width: 16.8% !important;
}
.realestate-sub li:nth-child(3){
    width: 25% !important;
}
.realestate-sub li:nth-child(4){
    width: 25% !important;
}
/*.sublist-wrap li:last-child a{
    border: none;
}*/
.sublist-wrap .nav-link:focus, .sublist-wrap .nav-link:hover {
    border-color: #d8d8d8 #d8d8d8 #d8d8d8;
}
.listing-master-wrap{
    margin-top: 8px;
    margin-bottom: 15px;
}
.list-subcategory .head{
    font-size: 11px;
    color: #333;
    font-weight: 700;
    padding-bottom: 3px;
}
.filter-right-boxes{
    margin-top: 19px;
}
.filter-right-boxes .box-typical:first-child{
    margin-top: 0;
}
#ranger {
    width: 100%;
}
.ranger {
    -webkit-appearance: none;
    width: 100%;
    height: 15px;
    border-radius: 5px;
    background: #d3d3d3;
    outline: none;
    opacity:1;
    -webkit-transition: .2s;
    transition: opacity .2s;
}
#ranger p {
    text-align: center;
    padding-top: 4px;
    font-size: 13px;
    font-weight: 600;
}
.slider:hover {
    opacity: 1;
}

.ranger::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background: #4fc3c5;
    cursor: pointer;
}

.ranger::-moz-range-thumb {
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background: #4fc3c5;
    cursor: pointer;
}
#adv-search .row .col{

}
.accordion-inner{
    margin-top: 0.4em;
}
.child-filter-boxes .list-group-item{
    padding: .4rem .75rem;
    border: 1px solid #eee !important;
    border-radius: 0;
}
.child-filter-boxes .list-group-item a{
    font-size: 13px;
    font-weight: 600;
    color: #484848;
    width: 100%;
    /* vertical-align: middle; */
    /* display: inline-block; */
    line-height: initial;
}
.no-border{
    border: none !important; 
}
.list-group-item > a .badge {
    margin-top:2px;
    background-color: #333;
    border-radius: 4px;
    float: right;
}
.badge{
    display: inline-block !important;
    min-width: 10px;
    padding: 3px 7px;
    font-size: 12px;
    font-weight: bold;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    background-color: #999;
    border-radius: 10px;
}
.card .badge{
    position: absolute;
    top: 0;
    left: -7px;
    max-width: 30px;
    width: 100%;
    background-color: rgba(255, 255, 255,0);
    /*background-color:#685199;*/
    padding-top: 0;
    padding-bottom: 0;
    border-radius: 0px;
    vertical-align: middle;
    line-height: 26px;
    font-size: 11px;
    font-weight: 400;
    text-transform: uppercase;
}
.card .badge img{
    float: left;
    position: relative;
}
.child-filter-boxes .accordion-inner{
    margin-top: 0;
}
.featured-wrap{
    position: relative;
    width: 100%;
   /* height: 100%;*/
   /* display: -webkit-box;*/
   display: inline-block;
    background-color: rgba(102,78,150,0.2);
    left: 0;
    top: 0;
}
.auto-sub{
    border-right: none !important;
}
/*.real-estate-tab .tab-pane .row .col .card-img-top{
    height: 181px !important;
    object-fit: contain;
}*/
.real-estate-tab .card-text.small{
    display: none;
}
.real-estate-tab .card-body{
    max-height:81px;
    overflow: hidden;
}
.hide {
    display: none;
}
.wishlist-head{
    position: relative;
}
.wishlist-head i{
    left: -5px;
    top: -1px;
    vertical-align: middle;
    font-size: 16px;
    position: relative;
}
.wishlist-item .card img{
    height: 65.84px;
}
.wishlist-item .card .card-body{
    padding-top: 2px;
    padding-bottom: 6px;
}
.wishlist-item .card .card-body h4 a{
        font-size: 12px;
}
.wishlist-item .card .card-body h4{
    margin-bottom: 0.2em;
    margin-top: 0.2em;
}
.wishlist-item .card{
    background-color: #f4f4f4;
}
.wishlist-item .card .card-body .card-title2{
    font-size: 14px;
}
.wishlist-item .row{
    margin-left: -8px;
    margin-right: -8px !important;
}
.wishlist-item .row .col{
    padding-left: 4px;
    padding-right: 4px;
    margin-bottom: 8px;
}
.wish-more{
   padding: 5px 7px;
   background-color: #FF9800;
   color: #ffffff !important;
   margin-top: 4px;
   margin-bottom: 2px;
   display: inline-block;
   margin-top: 2px;
   width: auto !important;
}
.job-desc-block .logo-postion figure img{
    max-width: 56px;
    height: 56px;
    width: 100%;
}
.job-offers .location{
}
.job-details-card{
    width: 100%;
    max-width: 598px;
    vertical-align: middle;
}
.job-desc-block .logo-postion a .latest-jobs-title{
    font-size: 14px;
    color: #484848;
}
.inline-block{
    display: inline-block;
}
.job-desc-block .logo-postion .job-label{
    font-size: 13px;
    color: #333;
}
.text-ago {
    float: right;
    margin-top: 5px;
    font-size: 12px;
}
.job_posted_on {
    color: #999;
}
.job-listing-wrap .card .card-img-top{
    max-width: 100%;
    height:71px;
    width:71px;
    margin: 0 auto;
    display: table;
}
.job-listing-wrap .card-text a{
    font-size: 13px;
    color: #484848;
}
.job-desc-short{
    margin-top: 5px;
}
.job-listing-wrap .featured-wrap{
    height: auto;
    display: inline-block;
}
.job-listing-wrap .amount{
    font-size: 14px;
}
.job-desc-short .location{
    font-size: 11px !important;
    color: rgba(0,0,0,.7);
}
.job-desc-short .card-title2{
    font-size: 12px;
}
.job-listing-wrap .card-text.small{
    border-bottom: 1px solid #c7c7c7;
    padding-bottom: 4px;
}
.pos-rel{
    position: relative;
}
.m-b-15{
    margin-bottom: 15px;
}
.wanted-people .card-img-top{
    height: 80px !important;
    width: 80px !important;
}
.age-hm{
    font-size: 12px;
    color: #333;
    margin-top: 0.9em;
    font-weight: 700;
}
.w-auto{
    width: auto;
}
.display-table{
    display: table;
}
.education-tab .card-text{
    max-height: 30px;
    overflow: hidden;
}
.number-plate h4{
    display: none;
}
.number-plate .card-img-top{
    object-fit: contain;
    height: 57px;
} 
.hm-content .job-desc-short .location {
    font-size: 12px !important;
    color: #333;
    font-weight: 600;
}
#cat-slider .carousel-inner{
    border: 1px solid #eee;
    box-sizing: border-box;
}
.store-sec-detail-img {
    width: 100%;
    overflow: hidden;
    object-fit: contain;
    height: 300px;
}
#cat-slider .glyphicon-chevron-right {
    background: url(../images/icon/glyph-nxt.png) no-repeat center;
}
#cat-slider .glyphicon-chevron-left {
    background: url(../images/icon/glyph-prev.png) no-repeat center;
}
.carousel-control {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    width: 15%;
    font-size: 20px;
    background-color: rgba(0,0,0,0);
}
.carousel-control.right, .carousel-control.left {
    background-image: none !important;
}
.carousel-control.right {
    right: 0;
    left: auto;
}
.carousel-control .glyphicon-chevron-left, .carousel-control .glyphicon-chevron-right, .carousel-control .icon-next, .carousel-control .icon-prev {
    position: absolute;
    top: 50%;
    z-index:auto;
    display: inline-block;
    margin-top: -10px;
}
.carousel-control .glyphicon-chevron-left, .carousel-control .glyphicon-chevron-right{
    width: 30px;
    height: 30px;
    margin-top: -10px;
    font-size: 30px;
    opacity: 0.8;
}
.carousel-control .glyphicon-chevron-left:hover,.carousel-control .glyphicon-chevron-right:hover{
    opacity: 1;
}
.carousel-control .glyphicon-chevron-left, .carousel-control .icon-prev {
    left: 50%;
    margin-left: -10px;
}
.carousel-control .glyphicon-chevron-right, .carousel-control .icon-next {
    right: 50%;
    margin-right: -10px;
}
#cat-slider .heart{
    width: 32px;
    height: 32px;
    line-height: 32px;
    background-color: rgba(100,78,151,0.7);
    position: absolute;
    left: 0;
    bottom:0;
    /*z-index: 1;*/
    border-radius: 2px;
    text-align: center;
}
#cat-slider .heart a i{
    font-size: 18px;
    color: #ffffff;
    vertical-align: middle;
}
#cat-slider .year-make{
    position: absolute;
    right: 0;
    bottom: 0;
    font-weight: 600;
    font-size: 22px;
    color: #fa424a;
    background-color: rgba(0,0,0,0.2);
    padding: 2px 6px;
}
.hide-bullets {
    list-style: none;
    width: 100%;
    float: left;
    position: relative;
    border-bottom: 1px dashed #eee;
    padding-bottom: 5px;
}
.store-bullets li {
    width: 60px;
    margin-top: 5px;
    margin-right: 5px;
    height: 60px;
    float: left;
}
.store-bullets .thumbnail a>img, .thumbnail>img {
    object-fit:cover;
    cursor: pointer;
}
.store-thumb-img {
    max-width: 100% !important;
    height: 50px !important;
}
.thumbnail {
    padding: 4px;
    line-height: 1.42857143;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    -webkit-transition: border .2s ease-in-out;
    -o-transition: border .2s ease-in-out;
    transition: border .2s ease-in-out;
    display: block;
}
.detail-page .breadcrumb{
    padding: 0;
    background-color: #ffffff;
    border: none;
    margin-bottom: 0;
}
.detail-page .node-breadcrumb {
    margin: 7px auto 7px;
}
.node-breadcrumb .breadcrumb li {
    overflow: hidden;
    display: inline-block;
    white-space: nowrap;
}
.node-breadcrumb .breadcrumb li.active,.node-breadcrumb .breadcrumb li a.active{
    font-weight: bold;
}
.node-breadcrumb .breadcrumb li a,.node-breadcrumb .breadcrumb li{
    font-size: 13px;
    color: #484848;
}
.node-breadcrumb .breadcrumb li a:hover{
    color: #333;
}
.node-breadcrumb .breadcrumb > li:not(:last-child):after {
    font-size: 10px;
    color: #9C9C9C;
    content: "\f054";
    font-family: 'FontAwesome';
    font-size: 9px;
    margin-top: 6px;
    padding: 0px 5px;
}
.store-detail-wrap .store-head{
    font-size:22px;
}
.store-detail-wrap .store-price{
    font-size: 24px;
    color: #fa424a;
}
.store-detail-wrap .store-price span{
    font-size: 16px;
    text-decoration: line-through;
    display: inline-block;
    color: #878787;
    padding-left: 5px;
}
.store-detail-wrap .store-detail-box{
    border: 1px solid #eee;
    box-sizing: border-box;
    padding-left: 9px;
    padding-right: 9px;
    max-width: 49.5%;
    margin-bottom: 7px;
    min-height: 99.38px;
}
.store-detail-wrap .store-detail-box .head{
    font-size: 15px;
    font-weight: 600;
    vertical-align: middle;
    /*display: inline-block;*/
    padding: 4.2px 0;
    border-bottom: 1px solid #eee;
}
.store-detail-wrap .store-detail-box .head figure {
    display:  inline-block;
    margin:  0;
    font-size:17px;
    margin-right: 3px;
    /*color: #644e95;*/
    color: #3c3341;
}
.amentity-box-wrap{
    margin-top: 7px !important; 
}
.amentity-box{
    padding-left: 4px !important;
    padding-right: 0px !important;
    margin-bottom: 4px;
}
.amentity-box span i{
    border: 1px solid #d2d2d2;
    padding: 4px;
    border-radius: 4px;
    font-weight: 500;
    box-sizing: border-box;
}
.store-detail-wrap .store-detail-box .head img{
    vertical-align: middle;
    display: inline-block;
}
.store-detail-wrap .store-detail-box .head i{
    position: relative;
    font-style: normal;
    top: 2px;
    text-transform: uppercase;
}
.store-detail-box .gnralbox{
    margin-left: -5px;
    margin-right: -5px;
}
.gnralbox{
    margin-top: 5px;
}
.gnralbox li{
    padding-left: 5px;
    padding-right: 5px;
}
.gnralbox  p {
    margin: 0 0 5px;
}
.gnralbox p span{
    display: inline-block;
    line-height: 18px;
}
.gnralbox p span a{
    color: #484848;
}
.gnralbox label {
    display: inline-block;
    padding: 0 2px 0 0;
    margin: 0;
    font-size: 14px;
    line-height: 100%;
    font-weight: 600;
}
.gnralbox i {
    font-style: normal;
    font-size: 13px;
}
.store-detail-box-wrap{
    margin-top: 15px;
}
.store-detail-box-wrap .store-detail-box:nth-child(even){
    float: right;
}
.full-description{
    padding-left: 9px;
    padding-right: 9px;
    font-size: 13px;
    line-height: 19px;
    margin-top: 15px;
    display: inline-block;
}
.full-description .head{
    border-bottom: 1px solid #eee;
    padding-bottom: 6px;
    font-size: 15px;
    font-weight: 600;
}
.full-description p{
    margin-top: 0.5em;
}
.btn-shadow{
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, .2);
    transition: box-shadow 0.2s ease;
}
.detail-btn{
    border-radius: 4px;
    padding: 10.9px 1em;
    float: left;
    font-size: 16px;
    font-weight: 600;
    height: 42.78px;
}
.detail-btn .fa-phone{
    font-size: 19px;
}
.detail-btn i{
    margin-right: 4px;
    font-size: 16px;
}
.detail-btn:hover,.detail-btn:focus{
    color: #ffffff;
}
.detail-btn-wrap{
    /*max-width:272px;
    width: 100%;*/
    display: table;
}
.image-upload-cat{
  margin-bottom: 0;
  font-size: 13px !important;
  display: inline-table;
  padding: .35rem .45rem;
}
.image-upload-cat i{
  font-size: 16px;
}
.phone-content{
    width: auto;
    border:1px solid #FF9800;
    display: none;
    border-radius: 4px;
    padding: 10.9px 1em;
    float: left;
    font-size: 16px;
    font-weight: 600;
    height: 42.78px;
    margin-right: 0.3em;
}
.btn-FF9800{
    background-color: #FF9800;
}
.detail-btn-wrap .hero-button:first-child{
    margin-right:0.3em;
}
.three-btn-wrap .hero-button:nth-child(2),.stock-btn-wrap .hero-button:nth-child(2) {
    margin-right:0.3em;
}
.detail-btn:hover {
    box-shadow: 0 4px 6px 0 rgba(0, 0, 0, .12);
}
.scrollup {
    width: 40px;
    height: 40px;
    text-align: center;
    color: #fff;
    font-size: 30px;
    background-color: rgba(100,78,151,0.8);
    position: fixed;
    bottom: 30px;
    right: 30px;
    font-weight: bold;
    border-radius:4px;
    transition: all 500ms .2s;
    cursor: pointer;
    line-height: 40px;
    vertical-align: middle;
    display: none;
    box-shadow: 0 3px 16px 0 rgba(0, 0, 0, .11)
}

.scrollup:hover {
    background-color: rgba(100,78,151,1);
    color: #fff;
    /*transform: scale(1.1);*/
}
.number-plate-btn  .hero-button{
    padding: 3px 0.5em !important;
    font-size: 12px !important;
    height: 25px !important;
}
.number-plate-btn{
    width:auto;
    max-width:auto;
    margin-top: 6px !important;
    margin-bottom: 6px !important;
}
.number-plate-btn  .hero-button .fa-phone {
    font-size: 16px;
}
.number-plate-btn  .hero-button i {
    margin-right: 3px;
    font-size: 14px;
}
/******Profile*********/
.personal-detail{
    width: 100%;
    display: inline-block;
    border-top: 1px solid #f1f1f1;
    padding-top: 8px;
}
.img-box-detail{
    width: auto;
    display: inline-block;
    margin-bottom:0; 
    vertical-align: middle;
}
.img-box-detail img{
    width: 125px;
    height: 125px;
    display: inline-block;
    vertical-align: middle;
    border-radius: 50%;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.05);
    box-shadow: 0 1px 1px rgba(0,0,0,0.2);
    border: 2px solid #eee;
    box-sizing: border-box;
    object-fit: cover;
}
.personal-detail .store-head{
    width: auto;
    display: inline-block;
    padding-left: 9px;
    vertical-align: middle;
    margin: 0;
}
.personal-detail .pos{
    font-size: 13px;
    color: #94969f;
    position: relative;
    left: 10px;
    vertical-align: middle;
    margin-bottom: 0;
    margin-top: 9px;
}
.personal-detail .pos i{
    font-size: 16px;
    margin-right: 4px;
}
.personal-detail .status{
    font-size: 12px;
    color: #ffffff;
    display: inline-block;
    padding-left: 15px;
    float: right;
    padding: 4px;
    background-color: #4ec3c5;
}
.personal-detail .store-head span i{
    font-size: 16px;
    color: #82888a;
    margin-right: 4px;
}
.three-btn-wrap{
    max-width: 501px !important;
}
.one-btn-wrap{
    max-width: 229px !important;
}
.detail-btn span .cart-ico{
    position: relative;
    top: -2px;
}
.text-school{

}
.enroll-btn{
    font-size: 12px;
    color: #ffffff;
    padding-left: 15px;
    float: right;
    padding: 5px 10px;
    background-color: #4ec3c5;
    transition: all ease-in-out .3s;
}
.enroll-btn:hover{
    opacity: 0.9;
    color: #ffffff;
}
.education-box{ 
    max-width: 100% !important;
}
/*.store-detail-wrap .store-detail-box .head figure i{
    top: 0;
}*/
.stock-btn-wrap{
    max-width: 555px !important;
}
.postad-first .card-body {
    /*padding: .77rem;*/
    padding-right: 0.5em;
    padding-top: 3px;
    padding-bottom: 0px;
} 
.postad-first .cat-wrap {
    margin-top: 7.1px;
}
.postad-first .card-header{
    background: #4fc3c5;
    display: inline-block;
    font-size: 14px;
    color: #ffffff;
    font-weight: 600;
    padding: 7px 7px;
    border-bottom: none;
}
.postad-first{margin-bottom: 15px;}
.sidebar{
    display: none;
}
/*.postad-first .card{
box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
}*/

/*.form-group:focus {   
  border-color: rgba(126, 239, 104, 0.8);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(126, 239, 104, 0.6);
  outline: 0 none;
}*/
#mob-collapse-sec{
    display: none;
}

/*Start Hot-Deals*/
.country-foot{
    padding: 0.8em 0em !important;
    text-align: center;
    position: relative;
    border: none !important;
}
.country-foot .active{
    font-weight: bold;
    color: #000;
}
.country-foot .overlay{
    opacity: 0.5;
}
.country-foot span{
    font-size: 14px;
    font-weight:600; 
    width: 100%;
    display: inline-block;
    text-transform: uppercase;
    color: #484848;
}
.country-foot span.soon-txt{
   color: #fa424a;
   font-size: 11px;
    top: -5px;
    position: relative;
}
.country-select-foot-box{
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.05) !important;
    border: 1px solid #eee !important;
    margin-top: 15px !important;
}




