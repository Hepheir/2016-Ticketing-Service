var pre_seat = undefined;
function seatSelect(seat){
  if (pre_seat != undefined) {
    document.getElementById('seatCell_'+pre_seat).className = 'seatCell default_default';
  }
  document.getElementById('hiddenSeatForm').innerHTML = '<input type="hidden" name="seat" value="'+seat+'" />';
  document.getElementById('seatCell_'+seat).className += ' selectedSeat';
  pre_seat = seat;
}
