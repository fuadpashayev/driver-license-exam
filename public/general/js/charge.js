var stripe = Stripe('pk_test_JVjPSJAxmKw6d15whyPKGbPm');

// Create an instance of Elements
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
    base: {
        color: '#32325d',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
            color: '#aab7c4'
        }
    },
    invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
    }
};

// Style button with BS
document.querySelector('#payment-form button').classList =
    'btn btn-primary btn-block mt-4';

// Create an instance of the card Element
var card = elements.create('card', { style: style });

// Add an instance of the card Element into the `card-element` <div>
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
    let selectedType = $('.card-select div.active').attr("id")
    console.log("selectedType: "+selectedType)
    console.log("event.brand: "+event.brand)
    if (selectedType !== event.brand) {
        event.error = {
            code: "incomplete_type",
            message: "Your card type is incomplete.",
            type: "card_type_error"
        }
        $('.ElementsApp,.InputElement').removeClass('is-complete').addClass('is-invalid')
    }
    $('.card-select').attr("writtenCard",event.brand)
    var displayError = document.getElementById('card-errors');
    if (event.error) {
        displayError.textContent = event.error.message;
    } else {
        displayError.textContent = '';
    }

});

// Handle form submission
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
    event.preventDefault();

    stripe.createToken(card).then(function(result) {
        console.log(result)
        let selectedType = $('.card-select div.active').attr("id")
        let writtenType = $('.card-select').attr("writtenCard")
        if (selectedType !== writtenType) {
            $('.ElementsApp,.InputElement').removeClass('is-complete').addClass('is-invalid')
            result = {
                error: {
                    code: "incomplete_type",
                    message: "Your card type is incomplete.",
                    type: "card_type_error"
                }
            }
        }
        if (result.error) {
            // Inform the user if there was an error
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
        } else {
            // Send the token to your server
            stripeTokenHandler(result.token);
        }
    });
});

function stripeTokenHandler(token) {
    var form = document.getElementById('payment-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);

    form.submit();
}

$(document).on("click",".card-select div",function () {
    $('.card-select div.active').removeClass('active')
    $(this).addClass('active')
})
