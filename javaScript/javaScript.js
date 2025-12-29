
//hello
document.getElementById('signUpForm').addEventListener('submit', function(event) {
  event.preventDefault(); 

  clearErrors();
  let form = this;//qikjo nifarforme ju referohet formes//
  let formData = new FormData(form); // i collect datat qikjo//i mledh te dhenat prej formes si psh username="stina" e merr vleren "stina"
  let isValid = validateForm(formData);//ktu kqyren a jon mbush format

  if (isValid) {//nese  te dhenat jan te vlershme
      fetch('./php/signUp.php', {//fetch dergon te dhena ne backEnd//form.action e percaktojn actioni te formulari
          method: 'POST',//metoda qe perdoret ne kete rast esht POST
          body: formData//te dhenat te mbledhur prej formes
      })
      .then(response => {//shkur e shqip nese kto tdhana jon coorecte ather qoje te faqja teter
          if (response.ok) {
              window.location.href = './getDemo.php'; // qikjo e qet tjt faqe

            } else {
              return response.text().then(error => { throw new Error(error); });
          }
      })
      .catch(error => {
          console.error('Error:', error.message);
      });
        document.getElementById('signUpForm').reset();
  }

});

function validateForm(formData) {
  let isValid = true;

  if (!formData.get('firstName')) {
      document.getElementById('errorFirstName').textContent = "First Name is required.";
      isValid = false;
  }
  if (!formData.get('lastName')) {
      document.getElementById('errorLastName').textContent = "Lasttt Name is required.";
      isValid = false;
  }
  if (!formData.get('email')) {
      document.getElementById('errorEmail').textContent = "Email is required.";
      isValid = false;
  }
  if (!formData.get('pasi')) {
      document.getElementById('errorPassword').textContent = "Password is required.";
      isValid = false;
  }
  if (!formData.get('photo')) {
      document.getElementById('errorPhoto').textContent = "Photo is required.";
      isValid = false;
  }
  if (!document.getElementById('termsCheck').checked) {
      document.getElementById('errorTerms').textContent = "You must agree to the terms.";
      isValid = false;
  }

  return isValid;
}





// document.getElementById('signUpForm').reset();
function clearErrors() {
  document.querySelectorAll('.error-message').forEach(error => (error.textContent = ''));
}
