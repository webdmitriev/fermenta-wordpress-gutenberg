<?php
$url = get_template_directory_uri();

$blocks = [
  [
    'name' => 'Block-01',
    'image' => $url.'/fermenta-gutenberg/images/block-01.jpg',
    'video' => $url.'/fermenta-gutenberg/pages/ui-page/block-67.mov'
  ],
  [
    'name' => 'Block-02',
    'image' => $url.'/fermenta-gutenberg/images/block-02.jpg',
    'video' => $url.'/fermenta-gutenberg/pages/ui-page/block-67.mov'
  ],
  [
    'name' => 'Block-03',
    'image' => $url.'/fermenta-gutenberg/images/block-03.jpg',
    'video' => $url.'/fermenta-gutenberg/pages/ui-page/block-67.mov'
  ],
  [
    'name' => 'Block-04',
    'image' => $url.'/fermenta-gutenberg/images/block-04.jpg',
    'video' => $url.'/fermenta-gutenberg/pages/ui-page/block-67.mov'
  ],
  [
    'name' => 'Block-05',
    'image' => $url.'/fermenta-gutenberg/images/block-05.jpg',
    'video' => $url.'/fermenta-gutenberg/pages/ui-page/block-67.mov'
  ],
  [
    'name' => 'Block-06',
    'image' => $url.'/fermenta-gutenberg/images/block-06.jpg',
    'video' => $url.'/fermenta-gutenberg/pages/ui-page/block-67.mov'
  ],
  [
    'name' => 'Block-07',
    'image' => $url.'/fermenta-gutenberg/images/block-07.jpg',
    'video' => $url.'/fermenta-gutenberg/pages/ui-page/block-67.mov'
  ],
  [
    'name' => 'Block-08',
    'image' => $url.'/fermenta-gutenberg/images/block-08.jpg',
    'video' => $url.'/fermenta-gutenberg/pages/ui-page/block-67.mov'
  ],
  [
    'name' => 'Block-09',
    'image' => $url.'/fermenta-gutenberg/images/block-09.jpg',
    'video' => $url.'/fermenta-gutenberg/pages/ui-page/block-67.mov'
  ],
  [
    'name' => 'Block-10',
    'image' => $url.'/fermenta-gutenberg/images/block-10.jpg',
    'video' => $url.'/fermenta-gutenberg/pages/ui-page/block-67.mov'
  ],
  [
    'name' => 'Block-11',
    'image' => $url.'/fermenta-gutenberg/images/block-11.jpg',
    'video' => $url.'/fermenta-gutenberg/pages/ui-page/block-67.mov'
  ],
  [
    'name' => 'Block-12',
    'image' => $url.'/fermenta-gutenberg/images/block-12.jpg',
    'video' => $url.'/fermenta-gutenberg/pages/ui-page/block-67.mov'
  ],
  [
    'name' => 'Block-13',
    'image' => $url.'/fermenta-gutenberg/images/block-13.jpg',
    'video' => $url.'/fermenta-gutenberg/pages/ui-page/block-67.mov'
  ],
  [
    'name' => 'Block-14',
    'image' => $url.'/fermenta-gutenberg/images/block-14.jpg',
    'video' => $url.'/fermenta-gutenberg/pages/ui-page/block-67.mov'
  ],
  [
    'name' => 'Block-15',
    'image' => $url.'/fermenta-gutenberg/images/block-15.jpg',
    'video' => $url.'/fermenta-gutenberg/pages/ui-page/block-67.mov'
  ],
]
?>

<div class="wrap-title">
  <h2 class="title" style="font-size: 20px;">Инструкции:</h2>
</div>

<div class="tabs">
  <div class="tabs__navigation">
    <div class="tabs__btn active">Дизайн</div>
    <div class="tabs__btn">Gutenberg (video)</div>
  </div>

  <div class="tabs__content">
    <div class="tabs__body active">
      <h3 class="title" style="margin-bottom: 5px;font-size: 17px;">Библиотека фонов (цвета)</h3>
      <div class="wrap-admin">
        <span class="subtitle">white -</span>
        <code>#ffffff</code>
        <div class="wrap-admin_block-bgc" style="background-color: #ffffff;"></div>
      </div>
      <div class="wrap-admin">
        <span class="subtitle">black -</span>
        <code>#313131</code>
        <div class="wrap-admin_block-bgc" style="background-color: #313131;"></div>
      </div>
      <div class="wrap-admin">
        <span class="subtitle">oatmeal -</span>
        <code>#dacdc2</code>
        <div class="wrap-admin_block-bgc" style="background-color: #dacdc2;"></div>
      </div>
      <div class="wrap-admin">
        <span class="subtitle">taupe -</span>
        <code>#6e6259</code>
        <div class="wrap-admin_block-bgc" style="background-color: #6e6259;"></div>
      </div>
      <div class="wrap-admin">
        <span class="subtitle">eucalyptus -</span>
        <code>#8ca086</code>
        <div class="wrap-admin_block-bgc" style="background-color: #8ca086;"></div>
      </div>
      <div class="wrap-admin">
        <span class="subtitle">maroon -</span>
        <code>#7e4c4d</code>
        <div class="wrap-admin_block-bgc" style="background-color: #7e4c4d;"></div>
      </div>
      <div class="wrap-admin">
        <span class="subtitle">pinkish -</span>
        <code>#e9cccd</code>
        <div class="wrap-admin_block-bgc" style="background-color: #e9cccd;"></div>
      </div>
      <hr/>
    </div>
    <div class="tabs__body">
      <div class="gutenberg_items">

        <div class="gutenberg_item" style="position: sticky;top:0;left:0;width:100%;">
          <div class="gutenberg_item-num" style="font-size: 16px;">Название блока:</div>
          <div class="gutenberg_item-image" style="font-size: 16px;">Картинка блока:</div>
          <div class="gutenberg_item-video" style="font-size: 16px;color:#000;">Видео инструкция:</div>
        </div>

        <?php foreach ($blocks as $block): ?>
          <div class="gutenberg_item">
            <div class="gutenberg_item-num"><?= $block['name']; ?></div>
            <div class="gutenberg_item-image"><img src="<?= $block['image']; ?>" alt="Image"></div>
            <div class="gutenberg_item-video" data-gutenberg-video="<?= $block['video']; ?>">Смотреть видео</div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>
</div>

<div class="popup" style="display: none;"><div class="popup-bg"></div><div class="popup-content"><img src="data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==" alt="MGU"></div></div>

<div class="popup popup-video" style="display: none;"><div class="popup-bg"></div><div class="popup-content"><video src="" autoplay controls></video></div></div>

<style>
.wrap-admin { display: flex;flex-wrap: wrap;justify-content: flex-start;align-items: center;width: 100%;margin-bottom: 4px; }
.wrap-admin .wrap-admin_block-bgc { width: 18px;height: 18px; }

.wrap-admin .subtitle,
.wrap-title .subtitle { padding-left: 0; }
.contact-form__params { display: block;width: 100%; }
.contact-form__params .contact-form__param { display: flex;flex-wrap: wrap;justify-content: flex-start;align-items: center;width: 100%;margin-bottom: 25px; }
.contact-form__params .contact-form__param .contact-form__param-image { display: block;max-width: 280px; }
.contact-form__params .contact-form__param .contact-form__param-image img { width: 100%;height: 100%;object-fit: contain; }

.tabs{display:block;width:100%}.tabs__navigation{display:flex;flex-wrap:wrap;justify-content:flex-start;align-items:flex-start;border-bottom:2px solid #ff762f}.tabs__navigation:hover .tool-tabs__tab.active{color:#000;font-weight:400;background-color:#ff762f}.tabs__navigation:hover .tool-tabs__tab.active:after{width:0}.tabs__navigation:hover .tool-tabs__tab:hover.active{color:#000;font-weight:500}.tabs__navigation:hover .tool-tabs__tab:hover.active:after{width:100%}.tabs__btn{position:relative;display:block;padding:5px 10px 10px 10px;font-size:22px;line-height:1;color:#000;background-color:rgba(0,0,0,0);transition:color .2s;border:none;cursor:pointer}.tabs__btn.active{color:#fff;font-weight:400;background-color:#ff762f}.tabs__btn:hover.active{color:#fff}.tabs__content{margin-top:15px}.tabs__body{display:none;font-size:18px}.tabs__body.active{display:block}.tabs .gutenberg_items{display:block;width:100%}.tabs .gutenberg_items .gutenberg_item{display:flex;flex-wrap:wrap;justify-content:flex-start;align-items:center;width:100%;margin-bottom:10px;padding-bottom:10px;border-bottom:1px solid #000}.tabs .gutenberg_items .gutenberg_item .gutenberg_item-num{display:block;width:260px;font-size:19px;line-height:1.2;color:#000}.tabs .gutenberg_items .gutenberg_item .gutenberg_item-image{display:block;width:260px;margin-right:30px}.tabs .gutenberg_items .gutenberg_item .gutenberg_item-image img{width:100%;height:100%;object-fit:contain;cursor:pointer}.tabs .gutenberg_items .gutenberg_item .gutenberg_item-video{display:block;width:140px;margin-right:10px;font-size:18px;line-height:1;color:#6495ed;cursor:pointer}.tabs .gutenberg_items .gutenberg_item .gutenberg_item-code{display:block;width:calc(100% - 760px);max-height:220px;padding-left:10px;border-left:1px solid #000;overflow-y:scroll}.tabs .gutenberg_items .gutenberg_item .gutenberg_item-code xmp{font-size:13px}.popup{position:fixed;top:0;left:0;width:100%;height:100%;z-index:100}.popup .popup-bg{position:absolute;top:0;left:0;width:100%;height:100%;background-color:rgba(0,0,0,.7);z-index:10}.popup .popup-content{position:absolute;top:50%;left:50%;width:740px;height:auto;transform:translate(-50%, -50%);z-index:20}.popup .popup-content img{width:100%;height:100%;object-fit:contain}@media(max-width: 768px){.popup .popup-content{width:100%}}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const tabs = document.querySelectorAll('.tabs__btn');
  const tabsContent = document.querySelectorAll('.tabs__body');

  const imagesPreview = document.querySelectorAll('.gutenberg_item-image');
  const popup = document.querySelector('.popup');
  const popupClose = popup.querySelector('.popup-bg');
  const popupImg = popup.querySelector('.popup-content');

  const videoPreview = document.querySelectorAll('[data-gutenberg-video]');
  const popupVideo = document.querySelector('.popup-video');
  const videoClose = popupVideo.querySelector('.popup-bg');
  const video = popupVideo.querySelector('.popup-content');

  if (tabsContent.length > 0 || tabs.length > 0) {
    function hideTabContent() { tabsContent.forEach(item => { item.classList.remove('active') });tabs.forEach(item => { item.classList.remove('active') }); }
    function showTabContent(i = 0) { tabsContent[i].classList.add('active');tabs[i].classList.add('active'); }
    hideTabContent();
    showTabContent();
    tabs.forEach((tab, index) => { tab.addEventListener('click', () => { hideTabContent();showTabContent(index); }); });
  }

  for (let i = 0; i < imagesPreview.length; i++) { imagesPreview[i].addEventListener('click', function(e) { popup.style.display = 'block';popupImg.querySelector('img').setAttribute("src", e.target.getAttribute('src')); }) }
  for (let i = 0; i < videoPreview.length; i++) { videoPreview[i].addEventListener('click', function(e) { popupVideo.style.display = 'block';video.querySelector('video').setAttribute("src", e.target.getAttribute('data-gutenberg-video')); }) }

  popupClose.addEventListener('click', function() { popup.style.display = 'none'; })
  videoClose.addEventListener('click', function() { popupVideo.style.display = 'none';popupVideo.querySelector('video').setAttribute("src", ''); })
});
</script>