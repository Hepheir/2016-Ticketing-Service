function delay(gap){ /* gap is in millisecs */
  var then,now;
  then=new Date().getTime();
  now=then;
  while((now-then)<gap){
    now=new Date().getTime();  // 현재시간을 읽어 함수를 불러들인 시간과의 차를 이용하여 처리
  }
} //http://blog.opid.kr/116
