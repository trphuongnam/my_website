<template>
  <CHeader>
    <CContainer fluid>
      <CHeaderBrand href="javascript:void(0)" id="header">
        <h2>EDIT PROFILE INFORMATION</h2>
        <router-link
          class="btn btn-danger rounded-pill"
          :to="{ name: 'ListProfile' }"
        >
          <CIcon :icon="cilArrowCircleLeft" size="xs" /> Back
        </router-link>
      </CHeaderBrand>
    </CContainer>
  </CHeader>
  <CForm>
    <div class="mb-3">
      <CFormLabel for="select_profile_type">Category</CFormLabel>
      <CFormSelect
        id="select_profile_type"
        aria-label="Default select example"
        :options="typeInfoProfile"
        :value="profileInfo.type"
      >
      </CFormSelect>
    </div>
    <div class="mb-3">
      <CFormLabel for="input_content">Contents</CFormLabel>
      <div
        id="textbox_content"
        v-for="(content, index) in profileInfo.contents"
        v-html="content.contentElement"
        :key="index"
      ></div>
      <CAlert color="danger" v-if="errors.errorContent != false">
        Please enter the content!!
      </CAlert>
      <CButton color="success" variant="outline" v-on:click="insertField">
        Insert Fields
      </CButton>
    </div>
    <div class="mb-3">
      <CFormLabel for="select_status">Status</CFormLabel>
      <CFormSelect
        id="select_status"
        aria-label="Default select example"
        :options="status"
        :value="profileInfo.status"
      >
      </CFormSelect>
    </div>
    <CButton type="submit" color="primary" v-on:click="updateProfile">
      <CIcon :icon="cilSave" size="xs" /> Save
    </CButton>
  </CForm>
</template>
<script>
import { urlConfigMixin } from '@/mixin/urlConfigMixin.js'
import { typeInfoProfile } from '@/mixin/typeInfoProfile.js'
import { cilArrowCircleLeft, cilSave } from '@coreui/icons'
import axios from 'axios'

export default {
  name: 'EditWebsiteInforView',
  mixins: [typeInfoProfile, urlConfigMixin],
  data() {
    return {
      profileInfo: {
        id: '',
        type: '',
        contents: [],
        status: '',
      },
      elementStatus: {
        loading: false,
      },
      elementNumber: {
        contentElements: 1,
      },
      errors: {
        errorCategory: false,
        errorContent: false,
        errorStatus: false,
      },
    }
  },
  created() {
    // Using this.$route.params.idInfo to get param idInfo in url
    var idProfile = this.$route.params.idInfo

    this.getProfileInfo(idProfile)
  },
  setup() {
    return {
      cilArrowCircleLeft,
      cilSave,
    }
  },
  methods: {
    /* Function insert field content when user click button insert Field */
    insertField: function (e) {
      e.preventDefault()
      var textContentElements =
        document.getElementsByClassName('textboxContent')
      var numTextcontentElement = textContentElements.length
      var newObjContentElement = ''

      if (numTextcontentElement > 0) {
        var newInputContent =
          "<textarea class='form-control textboxContent' style='margin-bottom: 10px' rows='3' id='content_" +
          (numTextcontentElement + 1) +
          "' placeholder='New Content'></textarea>"

        newObjContentElement = { contentElement: newInputContent }
        this.profileInfo.contents.push(newObjContentElement)
      }
    },

    // Function update profile
    updateProfile: function (e) {
      e.preventDefault()
      console.log('Oke')
    },

    // Function get profile info
    getProfileInfo: async function (idProfile) {
      try {
        var profileInfos = await axios.get(
          this.serverUrl + 'infomation/' + idProfile + '/edit',
        )

        console.log(profileInfos)
        var resultprofileInfo = profileInfos.data[0]
        this.profileInfo.id = resultprofileInfo.id
        this.profileInfo.type = resultprofileInfo.name
        this.profileInfo.status = resultprofileInfo.status

        // Show content to input
        this.displayContent(resultprofileInfo.content)
      } catch (error) {
        console.log(error)
      }
    },

    // Function display content to input
    displayContent: function (strContent) {
      var arrContent = strContent.split(' &curren; ')

      // Set num field display
      var arrContentLength = arrContent.length
      this.elementNumber.contentElements = arrContentLength

      var inputContent = ''
      var objContentElement = ''

      // Insert content to input content
      for (var i = 0; i < arrContentLength; i++) {
        inputContent =
          "<textarea class='form-control textboxContent' style='margin-bottom: 10px' rows='3' id='content_" +
          (i + 1) +
          "' placeholder='Content 2'>" +
          arrContent[i] +
          '</textarea>'

        objContentElement = { contentElement: inputContent }
        this.profileInfo.contents.push(objContentElement)
      }
    },
  },
}
</script>
<style scoped>
@import url('../../assets/css/message.css');
</style>
