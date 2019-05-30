$(function(){
  // 小ボタンクリック
  $('.btn-s').click(function(){
    $("h2").css('font-size', '1.5rem');
  });

  // 中ボタンクリック
  $('.btn-m').click(function(){
    $("h2").css('font-size', '5rem');
  });
  
  // 大ボタンクリック
  $('.btn-l').click(function(){
    $("h2").css('font-size', '10rem');
  });
  
});
