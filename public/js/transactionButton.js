/**
 * Created by tarik on 2016-11-22.
 */


function activateSubmitButtonFunction()
{
    if(document.getElementById("choseBillType").value!="empty")
    {
        document.getElementById("acceptBtn").disabled = false;
        document.getElementById("payBtn").disabled = false;
    }
}
