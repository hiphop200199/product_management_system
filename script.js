$(function() { //ready function
    const TOUCH_THRESHOLD = 200;  
    let degree = 0;
    let navigateLinkText = '';
    let touchPosition = {
        x:undefined,
        y:undefined
    };
    let touchKeys = [];
    let isTouchDown = false;
    
    $(window).on("touchstart",function(e){
                
        touchPosition.x=e.changedTouches[0].pageX;
        touchPosition.y=e.changedTouches[0].pageY;
        isTouchDown = true;
    });
    $(window).on("touchmove",function(e){

        if(isTouchDown){
            const   slideDistance = e.changedTouches[0].pageX - touchPosition.x;
        if(slideDistance<=-TOUCH_THRESHOLD
            &&touchKeys.indexOf('swipe left')===-1){
            touchKeys.push('swipe left');
            animate('prev');                         
        }else if(slideDistance>=TOUCH_THRESHOLD
                &&touchKeys.indexOf('swipe right')===-1){
            touchKeys.push('swipe right');
                    animate('next');
        }
        }
        
    }) ;
    $(window).on("touchend",function(){

        touchPosition.x=undefined;
        touchPosition.y=undefined;
        if(touchKeys.indexOf('swipe left')>-1)touchKeys.splice(touchKeys.indexOf('swipe left'),1);
        else if(touchKeys.indexOf('swipe right')>-1)touchKeys.splice(touchKeys.indexOf('swipe right'),1);
        isTouchDown = false;
    }) ;
   
    $("#prev").on("click",()=>animate('prev')); //要寫個函式回傳要做的事情

    $("#next").on("click",()=>animate('next'));

    /* $("input[name='password_confirmation']").on('change',function(){
        let password = $("input[name='password']").val(); //取得input欄位的值
        let password_confirmation = this.val();
        if(password !== password_confirmation){
            $('#message').text('密碼不一致');
        }
    }) */
    function animate(dir){
        dir === 'prev'?   degree-=180:degree+=180;
        if($('#navigate-link').text()==='商品清單'){ //檢查文字
            navigateLinkText = '新貨上架'
            $('#navigate-link').text(navigateLinkText);
            $('#navigate-link').attr('href', 'create.php');
          }else{
              navigateLinkText = '商品清單'
            $('#navigate-link').text(navigateLinkText);
            $('#navigate-link').attr('href', 'list.php'); //設定hmtl標籤屬性
          }
        $('#image-box').css('transform', `rotateY(${degree}deg)`);
    }


  



  });