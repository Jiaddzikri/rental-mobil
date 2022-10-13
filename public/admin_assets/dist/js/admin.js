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

function servicesUpdate() {
  const servicesUpdateButton = document.querySelectorAll(".services-update-button");
  const updateIconServices = document.querySelector(".update-icon-services");
  const updateTitleServices = document.querySelector(".update-title-services");
  const updateDescriptionServices = document.querySelector(".update-description-services");

  servicesUpdateButton.forEach((element) => {
    element.addEventListener("click", (y) => {
      y.preventDefault();
      let xhr = new XMLHttpRequest();
      xhr.open("GET", `/services/data/${element.getAttribute("data-id")}`, true);
      xhr.onreadystatechange = () => {
        if(xhr.readyState === 4 && xhr.status === 200) {
          let response = JSON.parse(xhr.responseText);
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
