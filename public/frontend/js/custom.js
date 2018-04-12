+function ($) {
  'use strict';

// Рецепты редактирование/создание

// Добавить ингридиенты
  $('.js-add-ingredient').on('click', function(e) {
      e.preventDefault();
      var i = $('.js-ingredients > div').length;
      $('<div><input id="input-ingredient-' + i + '" name="ingredient[]" type="text" /><span class="remove js-delete-ingredient"></span></div>').insertBefore(this);
  });
// Удалить ингридиенты
  $(document).on('click', '.js-delete-ingredient', function(e) {
      e.preventDefault();
      $(this).parent().remove();
      $('.js-ingredients > div').each(function(i) {
          $(this).attr('id', 'input-ingredient-' + i);
      });
  });

// Добавить Video
  $('.js-add-video').on('click', function(e) {
      e.preventDefault();
      var i = $('.js-video > div').length;
      $('<div><input id="input-video-' + i + '" name="video[]" type="text" /><span class="remove js-delete-video"></span></div>').insertBefore(this);
  });

// Удалить Video
  $(document).on('click', '.js-delete-video', function(e) {
      e.preventDefault();
      $(this).parent().remove();
      $('.js-video > div').each(function(i) {
          $(this).attr('id', 'input-video-' + i);
      });
  });

// Клонируем шаг рецепта
  var count = 0;
  var recipeCount = 1;
  var inputRecipe = $('#recipeBlank > div').clone();
  $("#cloneRecipe").on("click", function(e){
    e.preventDefault();
    count++;
    recipeCount = $('.recipes').children().length; // Для номера "Крок"
    var newBlock = inputRecipe.clone();
    newBlock.find('#step_image').attr('id', 'step_image'+count);
    newBlock.find('.title').text('Крок '+recipeCount);

    $(newBlock).insertBefore(this);

    document.getElementById('step_image'+count).addEventListener('change', handleImage, false);
  });






}(jQuery);

// Функции - доступны с любого места

// Отображение картинки при выборе
function handleImage(e) {
  var reader = new FileReader();
  reader.onload = function (event) {
    $(e.target).parent().find('img').attr('src',event.target.result);
  }
  reader.readAsDataURL(e.target.files[0]);
};

$.fn.stars = function() {
  return $(this).each(function() {
    $(this).html($('<span />').width(Math.max(0, (Math.min(5, parseFloat($(this).html())))) * $(this).width()/5));
  });
};
