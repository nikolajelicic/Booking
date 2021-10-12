$(".calculate").click(function(){
    $("#priceMessage").empty()
    var from = $("#from").val()
    var to = $("#to").val()
    console.log(from,to);
    var price = $("#price").val()
    var persons = $("#persons").val()
    var date1 = new Date(from)
    var date2 = new Date(to)
    var calculateDays = date2.getTime()-date1.getTime()
    var days_difference = calculateDays / (1000 * 60 * 60 * 24);  
    var total;
    var message = $("#priceMessage")
    if(persons == ""||from == ""||to == ""){
        message.append("Sva polja moraju biti popunjena")
    }else{
        total = persons*(days_difference*price)
        message.append("Ukupna cena za "+days_difference+" nocenja za "+persons+" ljudi je "+total+" dinara")
    }
})