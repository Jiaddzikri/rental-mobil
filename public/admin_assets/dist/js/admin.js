function imagePreview() {
  const adminImageInput = document.querySelector(".admin-image-input");
  const adminImageLabel = document.querySelector(".admin-image-label");
  const adminImagePreview = document.querySelector(".admin-image-preview");

  adminImageLabel.textContent = adminImageInput.files[0].name;

  const fileImage = new FileReader();
  fileImage.readAsDataURL(adminImageInput.files[0]);

  fileImage.onload = (e) => {
    adminImagePreview.src = e.target.result;
  }
}

const servicesUpdateButton = document.querySelectorAll(".services-update-button");
const updateIconServices = document.querySelector(".update-icon-services");
const updateTitleServices = document.querySelector(".update-title-services");
const updateDescriptionServices = document.querySelector(".update-description-services");
const updateServicesButton = document.querySelector(".update-services-button");
const servicesUpdateId = document.querySelector(".services-update-id");
const updateModalMessage = document.querySelector(".update-modal-message");

function servicesUpdate() {
  servicesUpdateButton.forEach((element) => {
    element.addEventListener("click", (y) => {
      y.preventDefault();
      let xhr = new XMLHttpRequest();
      xhr.open("GET", `/services/data/${element.getAttribute("data-id")}`, true);
      xhr.onreadystatechange = () => {
        if(xhr.readyState === 4 && xhr.status === 200) {
          let response = JSON.parse(xhr.responseText);
          servicesUpdateId.value = response.data.id;
          updateIconServices.value = response.data.icon;
          updateTitleServices.value = response.data.title;
          updateDescriptionServices.value = response.data.description;
        }
      }
      xhr.send();
    });
  });
}
servicesUpdate();

function servicesUpdateForm() {
  const updateServicesForm = document.forms.namedItem("updateServicesForm");
  const csrf_token = document.querySelector("meta[name='csrf-token']");

  updateServicesForm.addEventListener("submit", (btn) => {
    let formData = new FormData(updateServicesForm);
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
      if(xhr.readyState === 4 && xhr.status === 200) {
        let response = JSON.parse(xhr.responseText);
        updateIconServices.value = response.data.icon;
        updateTitleServices.value = response.data.title;
        updateDescriptionServices.value = response.data.description;

        if(response.response === 200) {
          updateModalMessage.innerText = response.message.success;
        } else if(response === 404) {
          updateModalMessage.innerText = response.message.failed;
        }
      }
    }
    xhr.open('POST','/admin/services/data', true);
    xhr.setRequestHeader("X-CSRF-TOKEN", csrf_token.getAttribute("content"));
    xhr.send(formData);
    btn.preventDefault();
  });
}
servicesUpdateForm();
