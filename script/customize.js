$('option').on('click', function(){
    const $gen = $('#generator option:selected');
    const $shield = $('#shielding option:selected');
    const $eng = $('#engine option:selected');
    const $hyper = $('#hyperdrive option:selected');
    const $purp = $('#purpose option:selected');

    let $genPower = $gen.data('power');
    let $shieldPower = $shield.data('power');
    let $engPower = $eng.data('power');
    let $hyperPower = $hyper.data('power');

    let $power = Number($genPower) - Number($shieldPower) - Number($engPower) - Number($hyperPower);

    let $genPrice = $gen.data('price');
    let $shieldPrice = $shield.data('price');
    let $engPrice = $eng.data('price');
    let $hyperPrice = $hyper.data('price');
    let $purpPrice = $purp.data('price-multiply');

    let $totalPrice = (Number($genPrice) + Number($shieldPrice) + Number($engPrice) + Number($hyperPrice))
        * Number($purpPrice);
    $totalPrice = $totalPrice.toFixed(2);

    $('#priceLabel').html('Total Price: $ '+$totalPrice);
    $('#price').attr('value',$totalPrice);
    $('#powerLabel').html('Ship Power: '+$power +' MW');
    $('#power').attr('value',$power);


    if($power < 0){
        $('#submit').html('insufficient power');
        $('#submit').attr('disabled','disabled');
        $('#submit').attr('title','either upgrade the generator or downgrade another module');
    } else {
        $('#submit').html('Check Out');
        $('#submit').removeAttr('disabled');
        $('#submit').removeAttr('title');
    }

});