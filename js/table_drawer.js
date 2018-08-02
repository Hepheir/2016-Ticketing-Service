var pre_seat = undefined;
function default_table(seat){
  if (pre_seat != undefined) {
    document.getElementById('default_'+pre_seat).className = 'default default_default';
  }
  document.getElementById('hiddenSeatForm').innerHTML = '<input type="hidden" name="seat" value="'+seat+'" />';
  document.getElementById('default_'+seat).className += ' selectedSeat';
  pre_seat = seat;
}
