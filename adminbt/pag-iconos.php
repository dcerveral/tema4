<?
			
			
	//EDITAMOS

		if ($_POST){
			
				$sql="UPDATE  `empresa` SET  
						`textoi` =  '".addslashes($_POST['textoi'])."',
						`iconoi` =  '".$_POST['iconoi']."',
						`textoc` =  '".addslashes($_POST['textoc'])."',
						`iconoc` =  '".$_POST['iconoc']."',
						`textod` =  '".addslashes($_POST['textod'])."',
						
						`tituloi` =  '".addslashes($_POST['tituloi'])."',
						`tituloc` =  '".addslashes($_POST['tituloc'])."',
						`titulod` =  '".addslashes($_POST['titulod'])."',
						`iconod` =  '".$_POST['iconod']."'
						WHERE   `id` =1;";
		 
		 
		
	mysql_query($sql,$conex);
				$error="Iconos actualizados";
			
		}
			
			
					$consulta="select * from empresa where id='1'   limit 1;";
					$sql=mysql_query($consulta,$conex);
					$not=mysql_fetch_array($sql);
 
	if (!$not['iconoi']) {$not['iconoi']="fa fa-circle-o";}
	if (!$not['iconoc']) {$not['iconoc']="fa fa-circle-o";}
	if (!$not['iconod']) {$not['iconod']="fa fa-circle-o";}
 $array=array('500px'=>'500px','adjust'=>'adjust','adn'=>'adn','align-center'=>'align-center','align-justify'=>'align-justify','align-left'=>'align-left','align-right'=>'align-right','amazon'=>'amazon','ambulance'=>'ambulance','anchor'=>'anchor','android'=>'android','angellist'=>'angellist','angle-double-down'=>'angle-double-down','angle-double-left'=>'angle-double-left','angle-double-right'=>'angle-double-right','angle-double-up'=>'angle-double-up','angle-down'=>'angle-down','angle-left'=>'angle-left','angle-right'=>'angle-right','angle-up'=>'angle-up','apple'=>'apple','archive'=>'archive','area-chart'=>'area-chart','arrow-circle-down'=>'arrow-circle-down','arrow-circle-left'=>'arrow-circle-left','arrow-circle-o-down'=>'arrow-circle-o-down','arrow-circle-o-left'=>'arrow-circle-o-left','arrow-circle-o-right'=>'arrow-circle-o-right','arrow-circle-o-up'=>'arrow-circle-o-up','arrow-circle-right'=>'arrow-circle-right','arrow-circle-up'=>'arrow-circle-up','arrow-down'=>'arrow-down','arrow-left'=>'arrow-left','arrow-right'=>'arrow-right','arrow-up'=>'arrow-up','arrows'=>'arrows','arrows-alt'=>'arrows-alt','arrows-h'=>'arrows-h','arrows-v'=>'arrows-v','asterisk'=>'asterisk','at'=>'at','automobile'=>'automobile','backward'=>'backward','balance-scale'=>'balance-scale','ban'=>'ban','bar-chart-o'=>'bar-chart-o','barcode'=>'barcode','battery-0'=>'battery-0','battery-1'=>'battery-1','battery-2'=>'battery-2','battery-3'=>'battery-3','battery-4'=>'battery-4','beer'=>'beer','behance'=>'behance','behance-square'=>'behance-square','bell'=>'bell','bell-o'=>'bell-o','bell-slash'=>'bell-slash','bell-slash-o'=>'bell-slash-o','bicycle'=>'bicycle','binoculars'=>'binoculars','birthday-cake'=>'birthday-cake','bitbucket'=>'bitbucket','bitbucket-square'=>'bitbucket-square','bitcoin'=>'bitcoin','black-tie'=>'black-tie','bold'=>'bold','bomb'=>'bomb','book'=>'book','bookmark'=>'bookmark','bookmark-o'=>'bookmark-o','briefcase'=>'briefcase','bug'=>'bug','building'=>'building','building-o'=>'building-o','bullhorn'=>'bullhorn','bullseye'=>'bullseye','bus'=>'bus','buysellads'=>'buysellads','cab'=>'cab','calculator'=>'calculator','calendar'=>'calendar','calendar-check-o'=>'calendar-check-o','calendar-minus-o'=>'calendar-minus-o','calendar-o'=>'calendar-o','calendar-plus-o'=>'calendar-plus-o','calendar-times-o'=>'calendar-times-o','camera'=>'camera','camera-retro'=>'camera-retro','caret-down'=>'caret-down','caret-left'=>'caret-left','caret-right'=>'caret-right','caret-up'=>'caret-up','cart-arrow-down'=>'cart-arrow-down','cart-plus'=>'cart-plus','cc'=>'cc','cc-amex'=>'cc-amex','cc-diners-club'=>'cc-diners-club','cc-discover'=>'cc-discover','cc-jcb'=>'cc-jcb','cc-mastercard'=>'cc-mastercard','cc-paypal'=>'cc-paypal','cc-stripe'=>'cc-stripe','cc-visa'=>'cc-visa','certificate'=>'certificate','chain'=>'chain','check'=>'check','check-circle'=>'check-circle','check-circle-o'=>'check-circle-o','check-square'=>'check-square','check-square-o'=>'check-square-o','chevron-circle-down'=>'chevron-circle-down','chevron-circle-left'=>'chevron-circle-left','chevron-circle-right'=>'chevron-circle-right','chevron-circle-up'=>'chevron-circle-up','chevron-down'=>'chevron-down','chevron-left'=>'chevron-left','chevron-right'=>'chevron-right','chevron-up'=>'chevron-up','child'=>'child','chrome'=>'chrome','circle'=>'circle','circle-o'=>'circle-o','circle-o-notch'=>'circle-o-notch','circle-thin'=>'circle-thin','clock-o'=>'clock-o','clone'=>'clone','cloud'=>'cloud','cloud-download'=>'cloud-download','cloud-upload'=>'cloud-upload','cny'=>'cny','code'=>'code','code-fork'=>'code-fork','codepen'=>'codepen','coffee'=>'coffee','columns'=>'columns','comment'=>'comment','comment-o'=>'comment-o','commenting'=>'commenting','commenting-o'=>'commenting-o','comments'=>'comments','comments-o'=>'comments-o','compass'=>'compass','compress'=>'compress','connectdevelop'=>'connectdevelop','contao'=>'contao','copy'=>'copy','copyright'=>'copyright','creative-commons'=>'creative-commons','credit-card'=>'credit-card','crop'=>'crop','crosshairs'=>'crosshairs','css3'=>'css3','cube'=>'cube','cubes'=>'cubes','cut'=>'cut','cutlery'=>'cutlery','dashboard'=>'dashboard','dashcube'=>'dashcube','database'=>'database','dedent'=>'dedent','delicious'=>'delicious','desktop'=>'desktop','deviantart'=>'deviantart','diamond'=>'diamond','digg'=>'digg','dollar'=>'dollar','dot-circle-o'=>'dot-circle-o','download'=>'download','dribbble'=>'dribbble','dropbox'=>'dropbox','drupal'=>'drupal','edit'=>'edit','eject'=>'eject','ellipsis-h'=>'ellipsis-h','ellipsis-v'=>'ellipsis-v','envelope'=>'envelope','envelope-o'=>'envelope-o','envelope-square'=>'envelope-square','eraser'=>'eraser','euro'=>'euro','exchange'=>'exchange','exclamation'=>'exclamation','exclamation-circle'=>'exclamation-circle','expand'=>'expand','expeditedssl'=>'expeditedssl','external-link'=>'external-link','external-link-square'=>'external-link-square','eye'=>'eye','eye-slash'=>'eye-slash','eyedropper'=>'eyedropper','facebook-f'=>'facebook-f','facebook-official'=>'facebook-official','facebook-square'=>'facebook-square','fast-backward'=>'fast-backward','fast-forward'=>'fast-forward','fax'=>'fax','feed'=>'feed','female'=>'female','fighter-jet'=>'fighter-jet','file'=>'file','file-code-o'=>'file-code-o','file-excel-o'=>'file-excel-o','file-movie-o'=>'file-movie-o','file-o'=>'file-o','file-pdf-o'=>'file-pdf-o','file-photo-o'=>'file-photo-o','file-powerpoint-o'=>'file-powerpoint-o','file-sound-o'=>'file-sound-o','file-text'=>'file-text','file-text-o'=>'file-text-o','file-word-o'=>'file-word-o','file-zip-o'=>'file-zip-o','film'=>'film','filter'=>'filter','fire'=>'fire','fire-extinguisher'=>'fire-extinguisher','firefox'=>'firefox','flag'=>'flag','flag-checkered'=>'flag-checkered','flag-o'=>'flag-o','flash'=>'flash','flask'=>'flask','flickr'=>'flickr','folder'=>'folder','folder-o'=>'folder-o','folder-open'=>'folder-open','folder-open-o'=>'folder-open-o','font'=>'font','fonticons'=>'fonticons','forumbee'=>'forumbee','forward'=>'forward','foursquare'=>'foursquare','frown-o'=>'frown-o','gamepad'=>'gamepad','gbp'=>'gbp','ge'=>'ge','gear'=>'gear','gears'=>'gears','genderless'=>'genderless','get-pocket'=>'get-pocket','gg'=>'gg','gg-circle'=>'gg-circle','gift'=>'gift','git'=>'git','git-square'=>'git-square','github'=>'github','github-alt'=>'github-alt','github-square'=>'github-square','gittip'=>'gittip','globe'=>'globe','google'=>'google','google-plus'=>'google-plus','google-plus-square'=>'google-plus-square','google-wallet'=>'google-wallet','group'=>'group','h-square'=>'h-square','hand-grab-o'=>'hand-grab-o','hand-lizard-o'=>'hand-lizard-o','hand-o-down'=>'hand-o-down','hand-o-left'=>'hand-o-left','hand-o-right'=>'hand-o-right','hand-o-up'=>'hand-o-up','hand-peace-o'=>'hand-peace-o','hand-pointer-o'=>'hand-pointer-o','hand-scissors-o'=>'hand-scissors-o','hand-spock-o'=>'hand-spock-o','hand-stop-o'=>'hand-stop-o','hdd-o'=>'hdd-o','header'=>'header','headphones'=>'headphones','heart'=>'heart','heart-o'=>'heart-o','heartbeat'=>'heartbeat','history'=>'history','home'=>'home','hospital-o'=>'hospital-o','hotel'=>'hotel','hourglass'=>'hourglass','hourglass-1'=>'hourglass-1','hourglass-2'=>'hourglass-2','hourglass-3'=>'hourglass-3','hourglass-o'=>'hourglass-o','houzz'=>'houzz','html5'=>'html5','i-cursor'=>'i-cursor','inbox'=>'inbox','indent'=>'indent','industry'=>'industry','info'=>'info','info-circle'=>'info-circle','instagram'=>'instagram','institution'=>'institution','internet-explorer'=>'internet-explorer','intersex'=>'intersex','ioxhost'=>'ioxhost','italic'=>'italic','joomla'=>'joomla','jsfiddle'=>'jsfiddle','key'=>'key','keyboard-o'=>'keyboard-o','language'=>'language','laptop'=>'laptop','lastfm'=>'lastfm','lastfm-square'=>'lastfm-square','leaf'=>'leaf','leanpub'=>'leanpub','legal'=>'legal','lemon-o'=>'lemon-o','level-down'=>'level-down','level-up'=>'level-up','lg{font-size'=>'lg{font-size','life-bouy'=>'life-bouy','lightbulb-o'=>'lightbulb-o','line-chart'=>'line-chart','linkedin'=>'linkedin','linkedin-square'=>'linkedin-square','linux'=>'linux','list'=>'list','list-alt'=>'list-alt','list-ol'=>'list-ol','list-ul'=>'list-ul','location-arrow'=>'location-arrow','lock'=>'lock','long-arrow-down'=>'long-arrow-down','long-arrow-left'=>'long-arrow-left','long-arrow-right'=>'long-arrow-right','long-arrow-up'=>'long-arrow-up','magic'=>'magic','magnet'=>'magnet','mail-forward'=>'mail-forward','mail-reply'=>'mail-reply','mail-reply-all'=>'mail-reply-all','male'=>'male','map'=>'map','map-marker'=>'map-marker','map-o'=>'map-o','map-pin'=>'map-pin','map-signs'=>'map-signs','mars'=>'mars','mars-double'=>'mars-double','mars-stroke'=>'mars-stroke','mars-stroke-h'=>'mars-stroke-h','mars-stroke-v'=>'mars-stroke-v','maxcdn'=>'maxcdn','meanpath'=>'meanpath','medium'=>'medium','medkit'=>'medkit','meh-o'=>'meh-o','mercury'=>'mercury','microphone'=>'microphone','microphone-slash'=>'microphone-slash','minus'=>'minus','minus-circle'=>'minus-circle','minus-square'=>'minus-square','minus-square-o'=>'minus-square-o','mobile-phone'=>'mobile-phone','money'=>'money','moon-o'=>'moon-o','mortar-board'=>'mortar-board','motorcycle'=>'motorcycle','mouse-pointer'=>'mouse-pointer','music'=>'music','navicon'=>'navicon','neuter'=>'neuter','newspaper-o'=>'newspaper-o','object-group'=>'object-group','object-ungroup'=>'object-ungroup','odnoklassniki'=>'odnoklassniki','odnoklassniki-square'=>'odnoklassniki-square','opencart'=>'opencart','openid'=>'openid','opera'=>'opera','optin-monster'=>'optin-monster','pagelines'=>'pagelines','paint-brush'=>'paint-brush','paperclip'=>'paperclip','paragraph'=>'paragraph','paste'=>'paste','pause'=>'pause','paw'=>'paw','paypal'=>'paypal','pencil'=>'pencil','pencil-square'=>'pencil-square','phone'=>'phone','phone-square'=>'phone-square','photo'=>'photo','pie-chart'=>'pie-chart','pied-piper'=>'pied-piper','pied-piper-alt'=>'pied-piper-alt','pinterest'=>'pinterest','pinterest-p'=>'pinterest-p','pinterest-square'=>'pinterest-square','plane'=>'plane','play'=>'play','play-circle'=>'play-circle','play-circle-o'=>'play-circle-o','plug'=>'plug','plus'=>'plus','plus-circle'=>'plus-circle','plus-square'=>'plus-square','plus-square-o'=>'plus-square-o','power-off'=>'power-off','print'=>'print','puzzle-piece'=>'puzzle-piece','qq'=>'qq','qrcode'=>'qrcode','question'=>'question','question-circle'=>'question-circle','quote-left'=>'quote-left','quote-right'=>'quote-right','ra'=>'ra','random'=>'random','recycle'=>'recycle','reddit'=>'reddit','reddit-square'=>'reddit-square','refresh'=>'refresh','registered'=>'registered','remove'=>'remove','renren'=>'renren','retweet'=>'retweet','road'=>'road','rocket'=>'rocket','rotate-left'=>'rotate-left','rotate-right'=>'rotate-right','rss-square'=>'rss-square','ruble'=>'ruble','rupee'=>'rupee','safari'=>'safari','save'=>'save','search'=>'search','search-minus'=>'search-minus','search-plus'=>'search-plus','sellsy'=>'sellsy','send'=>'send','send-o'=>'send-o','server'=>'server','share-alt'=>'share-alt','share-alt-square'=>'share-alt-square','share-square'=>'share-square','share-square-o'=>'share-square-o','shekel'=>'shekel','shield'=>'shield','ship'=>'ship','shirtsinbulk'=>'shirtsinbulk','shopping-cart'=>'shopping-cart','sign-in'=>'sign-in','sign-out'=>'sign-out','signal'=>'signal','simplybuilt'=>'simplybuilt','sitemap'=>'sitemap','skyatlas'=>'skyatlas','skype'=>'skype','slack'=>'slack','sliders'=>'sliders','slideshare'=>'slideshare','smile-o'=>'smile-o','soccer-ball-o'=>'soccer-ball-o','sort-alpha-asc'=>'sort-alpha-asc','sort-alpha-desc'=>'sort-alpha-desc','sort-amount-asc'=>'sort-amount-asc','sort-amount-desc'=>'sort-amount-desc','sort-down'=>'sort-down','sort-numeric-asc'=>'sort-numeric-asc','sort-numeric-desc'=>'sort-numeric-desc','sort-up'=>'sort-up','soundcloud'=>'soundcloud','space-shuttle'=>'space-shuttle','spinner'=>'spinner','spoon'=>'spoon','spotify'=>'spotify','square'=>'square','square-o'=>'square-o','stack-exchange'=>'stack-exchange','stack-overflow'=>'stack-overflow','star'=>'star','star-half'=>'star-half','star-half-empty'=>'star-half-empty','star-o'=>'star-o','steam'=>'steam','steam-square'=>'steam-square','step-backward'=>'step-backward','step-forward'=>'step-forward','stethoscope'=>'stethoscope','sticky-note'=>'sticky-note','sticky-note-o'=>'sticky-note-o','stop'=>'stop','street-view'=>'street-view','strikethrough'=>'strikethrough','stumbleupon'=>'stumbleupon','stumbleupon-circle'=>'stumbleupon-circle','subscript'=>'subscript','subway'=>'subway','suitcase'=>'suitcase','sun-o'=>'sun-o','superscript'=>'superscript','table'=>'table','tablet'=>'tablet','tag'=>'tag','tags'=>'tags','tasks'=>'tasks','tencent-weibo'=>'tencent-weibo','terminal'=>'terminal','text-height'=>'text-height','text-width'=>'text-width','th'=>'th','th-large'=>'th-large','th-list'=>'th-list','thumb-tack'=>'thumb-tack','thumbs-down'=>'thumbs-down','thumbs-o-down'=>'thumbs-o-down','thumbs-o-up'=>'thumbs-o-up','thumbs-up'=>'thumbs-up','ticket'=>'ticket','times-circle'=>'times-circle','times-circle-o'=>'times-circle-o','tint'=>'tint','toggle-down'=>'toggle-down','toggle-left'=>'toggle-left','toggle-off'=>'toggle-off','toggle-on'=>'toggle-on','toggle-right'=>'toggle-right','toggle-up'=>'toggle-up','trademark'=>'trademark','train'=>'train','transgender-alt'=>'transgender-alt','trash'=>'trash','trash-o'=>'trash-o','tree'=>'tree','trello'=>'trello','tripadvisor'=>'tripadvisor','trophy'=>'trophy','truck'=>'truck','tty'=>'tty','tumblr'=>'tumblr','tumblr-square'=>'tumblr-square','turkish-lira'=>'turkish-lira','tv'=>'tv','twitch'=>'twitch','twitter'=>'twitter','twitter-square'=>'twitter-square','umbrella'=>'umbrella','underline'=>'underline','unlink'=>'unlink','unlock'=>'unlock','unlock-alt'=>'unlock-alt','unsorted'=>'unsorted','upload'=>'upload','user'=>'user','user-md'=>'user-md','user-plus'=>'user-plus','user-secret'=>'user-secret','user-times'=>'user-times','venus'=>'venus','venus-double'=>'venus-double','venus-mars'=>'venus-mars','viacoin'=>'viacoin','video-camera'=>'video-camera','vimeo'=>'vimeo','vimeo-square'=>'vimeo-square','vine'=>'vine','vk'=>'vk','volume-down'=>'volume-down','volume-off'=>'volume-off','volume-up'=>'volume-up','warning'=>'warning','wechat'=>'wechat','weibo'=>'weibo','whatsapp'=>'whatsapp','wheelchair'=>'wheelchair','wifi'=>'wifi','wikipedia-w'=>'wikipedia-w','windows'=>'windows','won'=>'won','wordpress'=>'wordpress','wrench'=>'wrench','xing'=>'xing','xing-square'=>'xing-square','y-combinator-square'=>'y-combinator-square','yahoo'=>'yahoo','yc'=>'yc','yelp'=>'yelp','youtube'=>'youtube','youtube-play'=>'youtube-play','youtube-square'=>'youtube-square',);
 ?>
   
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

<section class="content-header">
      <h1>
        Portada <small>Iconos</small>
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="<? echo $adminFolder; ?>">  Inicio</a></li>
         <li>Portada</li>
        <li class="active">Iconos</li>
      </ol>
    </section>
	
    <section class="content">
	<form action='<? echo $folderAdmin; ?>/iconos/?<? echo rand(111,999); ?>' method='POST'>
			   
	
	
      <div class="row">
        <div class="col-xs-12 col-lg-4">
          <div class="box">
            <div class="box-header">
				<strong>Icono Izquierda</strong>
			  <div class="box-tools pull-right">
               
                  </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               
				 <div class="input-group">
					<span class="input-group-addon">
					<div class="dropdown " >
						<span class=" dropdown-toggle"   id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">
							<i  class="<? echo $not['iconoi']; ?>" id='iconoi2' style='font-size:1.4em; '></i>
						</span>
						<div class="dropdown-menu " aria-labelledby="dropdownMenuButton" >
							<? foreach ($array as &$valor) { $a++; if ($a % 36 == 0) {echo "<div style='width:100%; height:5px;'></div>";}  ?>
								 <a class="dropdown-item" style="font-size:1.5em; margin:2px; color:grey"> <li class="fa fa-<? echo $valor; ?>" onclick="document.getElementById('iconoi').value=this.className;document.getElementById('iconoi2').className=this.className;"></li></a>
							<? }   ?>
						</div>
					</div>
					</span>
					<input  id='iconoi' type="text" name='iconoi' value="<? echo $not['iconoi']; ?>" class="form-control" >
				</div>
				 
				<div class="input-group">
					<span class="input-group-addon">Titulo</span>
					<input type="text" class="form-control" name='tituloi' value="<? echo $not['tituloi']; ?>" >
				</div>
			  
				<div class="form-group">
             
                  <textarea class="form-control " id="editor"  rows="40" name='textoi'><? echo $not['textoi']; ?></textarea>
				</div>
			  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		</div>
		
		
		<div class="col-xs-12 col-lg-4">
          <div class="box">
            <div class="box-header">
				<strong>Icono Centro</strong>
			  <div class="box-tools pull-right">
               
                  </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               
				 <div class="input-group">
					<span class="input-group-addon">
					<div class="dropdown " >
						<span class=" dropdown-toggle"   id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">
							<i  class="<? echo $not['iconoc']; ?>" id='iconoc2' style='font-size:1.4em; '></i>
						</span>
						<div class="dropdown-menu " aria-labelledby="dropdownMenuButton" >
							<? foreach ($array as &$valor) { $a++; if ($a % 36 == 0) {echo "<div style='width:100%; height:5px;'></div>";}  ?>
								 <a class="dropdown-item" style="font-size:1.5em; margin:2px; color:grey"> <li class="fa fa-<? echo $valor; ?>" onclick="document.getElementById('iconoc').value=this.className;document.getElementById('iconoc2').className=this.className;"></li></a>
							<? }   ?>
						</div>
					</div>
					</span>
					<input  id='iconoc' type="text" name="iconoc" value="<? echo $not['iconoc']; ?>" class="form-control" >
				</div>
				 
				<div class="input-group">
					<span class="input-group-addon">Titulo</span>
					<input type="text" class="form-control" name='tituloc' value="<? echo $not['tituloc']; ?>" >
				</div>
				<div class="form-group">
             
                  <textarea class="form-control " id="editor1"  rows="40" name='textoc'><? echo $not['textoc']; ?></textarea>
				</div>
			  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		</div>
		
		<div class="col-xs-12 col-lg-4">
          <div class="box">
            <div class="box-header">
				<strong>Icono Derecha</strong>
			  <div class="box-tools pull-right">
               
                  </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               
				 <div class="input-group">
					<span class="input-group-addon">
					<div class="dropdown " >
						<span class=" dropdown-toggle"   id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">
							<i  class="<? echo $not['iconod']; ?>" id='iconod2' style='font-size:1.4em; '></i>
						</span>
						<div class="dropdown-menu " aria-labelledby="dropdownMenuButton" >
							<? foreach ($array as &$valor) { $a++; if ($a % 36 == 0) {echo "<div style='width:100%; height:5px;'></div>";}  ?>
								 <a class="dropdown-item" style="font-size:1.5em; margin:2px; color:grey"> <li class="fa fa-<? echo $valor; ?>" onclick="document.getElementById('iconod').value=this.className;document.getElementById('iconod2').className=this.className;"></li></a>
							<? }   ?>
							 	</div>
					</div>
					</span>
					<input  id='iconod' type="text" name="iconod" value="<? echo $not['iconod']; ?>" class="form-control" >
				</div>
				 
				<div class="input-group">
					<span class="input-group-addon">Titulo</span>
					<input type="text" class="form-control" name='titulod' value="<? echo $not['titulod']; ?>" >
				</div>
				<div class="form-group">
             
                  <textarea class="form-control " id="editor2"  rows="40" name='textod'  ><? echo $not['textod']; ?></textarea>
				</div>
			  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		</div>
	</div>
	<div class="col-xs-12 align-right">		
		<input type="submit" class="btn btn-success  " value="Aceptar"  style="float:right;">
	</div>

	</form>
 </section>
			  
			  
		
		
		
 