function seatSubmit(){
  if (document.getElementById('idInput').value == '' || document.getElementById('nameInput').value == ''){
    alert('추후 티켓 지급을 위해 예매자 정보가 필요합니다.');
    return false;
  }
  if (document.getElementById('pwInput').value == ''){
    alert('예매 취소/조회시 본인확인용 비밀번호가 필요합니다.');
    return false;
  }
  if (confirm('타인의 허가없이 정보를 도용할 경우 법적 책임이 따를수 있습니다.')) {
    document.getElementById('seatForm').submit();
  }
}
