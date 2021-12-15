<template>
  <CHeader>
    <CContainer fluid>
      <CHeaderBrand href="javascript:void(0)" id="header">
        <h2>EDIT WEBSITE INFORMATION</h2>
        <router-link
          class="btn btn-danger rounded-pill"
          :to="{ name: 'ListWebsite' }"
        >
          <CIcon :icon="cilArrowCircleLeft" size="xs" /> Back
        </router-link>
      </CHeaderBrand>
    </CContainer>
  </CHeader>
  <CForm
    v-if="informations != null"
    id="form_edit_website_information"
    enctype="multipart/form-data"
  >
    <div class="mb-3">
      <CFormInput type="hidden" name="_token" v-bind:value="csrf" />
      <CFormLabel for="input_website_name">Website Name</CFormLabel>
      <CFormInput
        type="text"
        id="input_website_name"
        :value="informations.websiteName"
        v-model="informations.websiteName"
        name="website_name"
      />
      <CAlert
        color="danger"
        v-if="errors.error_websiteName != ''"
        v-html="errors.error_websiteName"
      >
      </CAlert>
    </div>
    <div class="mb-3">
      <CFormLabel for="input_website_description">Short Description</CFormLabel>
      <CFormInput
        type="text"
        id="input_website_description"
        :value="informations.description"
        v-model="informations.description"
        name="website_description"
      />
      <CAlert
        color="danger"
        v-if="errors.error_description != ''"
        v-html="errors.error_description"
      >
      </CAlert>
    </div>
    <div class="mb-3">
      <CFormLabel for="website_image">Website Image</CFormLabel><br />
      <CImage
        v-if="informations.imageUploading != null"
        rounded
        thumbnail
        :src="informations.imageUploading"
        v-model="informations.imageUploading"
        width="200"
        height="200"
        name="website_image"
      />
      <CFormInput type="file" id="website_image" @change="uploadFile" />
      <CAlert
        color="danger"
        v-if="errors.error_image != ''"
        v-html="errors.error_image"
      >
      </CAlert>
      <CAlert
        color="danger"
        v-if="errors.error_general != ''"
        v-html="errors.error_general"
      >
      </CAlert>
    </div>
    <div class="mb-3">
      <CFormLabel for="website_cv">Website CV</CFormLabel><br />
      <embed
        v-if="informations.cvUploading != null"
        :src="informations.cvUploading"
        width="200px"
        height="200px"
      />
      <CFormInput type="file" id="website_cv" @change="uploadFile" />
      <CAlert
        color="danger"
        v-if="errors.error_cv != ''"
        v-html="errors.error_cv"
      >
      </CAlert>
    </div>
    <div class="mb-3">
      <CFormInput
        type="hidden"
        id="id_website_description"
        :value="informations.id"
        v-model="informations.id"
      />
    </div>
    <CButton color="primary" v-on:click="submitForm">
      <CIcon :icon="cilSave" size="xs" /> Save
    </CButton>
  </CForm>
</template>
<script>
import { cilArrowCircleLeft, cilSave } from '@coreui/icons'
import axios from 'axios'

export default {
  name: 'EditWebsiteInforView',
  setup() {
    return {
      cilArrowCircleLeft,
      cilSave,
    }
  },
  data() {
    return {
      informations: {
        id: '',
        websiteName: '',
        description: '',
        websiteImage: null,
        imageUploading: null,
        websiteCV: null,
        cvUploading: null,
      },
      errors: {
        error_websiteName: '',
        error_description: '',
        error_image: '',
        error_general: '',
        error_cv: '',
      },
    }
  },
  beforeCreate() {
    // Using this.$route.params.idInfo to get param idInfo in url
    var idInformation = this.$route.params.idInfo
    axios
      .get(
        process.env.VUE_APP_SERVER_URL +
          'website_infomation/' +
          idInformation +
          '/edit',
      )
      .then((response) => {
        var resultWebsiteInfor = response.data[0]
        this.informations.id = resultWebsiteInfor.id
        this.informations.websiteName = resultWebsiteInfor.website_name
        this.informations.description = resultWebsiteInfor.short_desc
        this.informations.imageUploading =
          process.env.VUE_APP_IMAGE_URL + resultWebsiteInfor.avatar
        this.informations.cvUploading =
          process.env.VUE_APP_CV_URL + resultWebsiteInfor.file_url
      })
      .catch((error) => console.log(error))
  },
  methods: {
    uploadFile: function (event) {
      let fileUpload = event.target.files[0]
      let typeFileUpload = fileUpload.type
      let arrImageType = ['image/png', 'image/jpg', 'image/jpeg']
      let arrCVType = ['application/pdf']

      // Check if type of image upload not equal, return error
      if (arrImageType.includes(typeFileUpload)) {
        this.validateUploadFile(fileUpload, arrImageType)
      } else if (arrCVType.includes(typeFileUpload)) {
        this.validateUploadFile(fileUpload, arrImageType)
      } else {
        this.errors.error_general = 'File không đúng định dạng cho phép'
      }
    },
    submitForm: async function (e) {
      e.preventDefault()
      try {
        var infoId = this.informations.id
        var websiteName = this.informations.websiteName
        var description = this.informations.description
        var websiteImage = this.informations.websiteImage
        var websiteCV = this.informations.websiteCV

        // Validate informtion user entered in form
        let inputValid = this.validateInput(websiteName, description)

        if (inputValid) {
          // Defined object FormData to upload image in server
          var objFormData = new FormData()

          console.log(websiteName)
          // Add the form data need to submit
          objFormData.append('websiteName', websiteName)
          objFormData.append('description', description)
          objFormData.append('_method', 'PUT')
          objFormData.append('infoId', infoId)
          if (websiteImage != null) {
            objFormData.append('avatar', websiteImage)
          }
          if (websiteCV != null) {
            objFormData.append('mycv', websiteCV)
          }

          // Send data to server using axios
          var url =
            process.env.VUE_APP_SERVER_URL + 'website_infomation/' + infoId
          let sendData = await axios({
            method: 'post',
            url: url,
            data: objFormData,
            config: { headers: { 'Content-Type': 'multipart/form-data' } },
          })
          if (sendData) {
            if (sendData.data.stt == false) {
              this.errors.error_general = sendData.data.value
            } else {
              this.$router.push({ name: 'WebsiteInfo' })
            }
          }
        }
      } catch (error) {
        console.error(error.message)
      }
    },
    validateInput: function (websiteName, description) {
      if (websiteName == '') {
        this.errors.error_websiteName = 'Tên Website Không Được Để Trống'
        return false
      } else if (description == '') {
        this.errors.error_websiteName = ''
        this.errors.error_description = 'Mô Tả Website Không Được Để Trống'
        return false
      } else {
        this.errors.error_websiteName = ''
        this.errors.error_description = ''
        return true
      }
    },
    validateUploadFile: function (fileUpload, arrImageType) {
      // create a new FileReader to read this image and convert to base64 format
      var reader = new FileReader()

      // Define a callback function to run, when FileReader finishes its job
      reader.onload = (e) => {
        // Read image as base64 and set to imageData
        if (arrImageType.includes(fileUpload.type)) {
          this.informations.imageUploading = e.target.result
        } else {
          this.informations.cvUploading = e.target.result
        }
      }
      // Start the reader job - read file as a data url (base64 format)
      reader.readAsDataURL(fileUpload)
      if (arrImageType.includes(fileUpload.type)) {
        this.informations.websiteImage = fileUpload
      } else {
        this.informations.websiteCV = fileUpload
      }
    },
  },
}
</script>
<style scoped>
.alert {
  margin-top: 10px;
}
</style>
