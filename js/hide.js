function GetSelectedTextValue(leaveType){
    
if(leaveType.value == "Half Day"){
    document.getElementById("endDate").style.display = 'none';
    document.getElementById("startDateLabel").innerHTML = 'Date';
    document.getElementById("endDateLabel").style.display = 'none';

}
if(leaveType.value == "Full Day"){
    document.getElementById("startDate").style.display = '';
    document.getElementById("endDate").style.display = '';
    document.getElementById("startDateLabel").innerHTML = 'Start Date';
    document.getElementById("endDateLabel").style.display = '';


}
}
$(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;    
    $('#attendancedate').attr('max', maxDate);
});