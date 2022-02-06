<template>
  <CHeader>
    <CContainer fluid>
      <CHeaderBrand href="javascript:void(0)" id="header">
        <h2>ADD PROFILE INFORMATION</h2>
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
        :options="typeInfoProfile"
        v-model="profileInfo.type"
      >
      </CFormSelect>
      <CAlert color="danger" v-if="errors.errorCategory != false">
        Please choose the category!!
      </CAlert>
    </div>
    <div class="mb-3">
      <CFormLabel for="input_content">Contents</CFormLabel>
      <div id="textbox_content">
        <CFormTextarea
          rows="3"
          class="textboxContent"
          v-for="(element, index) in elementNumber.contentElements"
          :key="index"
          :id="index + 1"
          :placeholder="'Content ' + (index + 1)"
          v-model="profileInfo.content[index]"
        ></CFormTextarea>
      </div>
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
        v-model="profileInfo.status"
      >
      </CFormSelect>
      <CAlert color="danger" v-if="errors.errorStatus != false">
        Please choose the status!!
      </CAlert>
    </div>
    <CButton
      type="submit"
      color="primary"
      id="btn_submit"
      v-on:click="submitForm"
    >
      <CIcon :icon="cilSave" size="xs" /> Save
    </CButton>
  </CForm>
  <div class="bgr_loading" v-if="elementStatus.loading == true">
    <img src="@/assets/icons/loading.gif" />
  </div>

  <NotificationGroup group="error" position="bottom">
    <div
      class="fixed inset-x-0 bottom-0 flex items-start justify-end p-6 px-4 py-6 pointer-events-none"
    >
      <div class="w-full max-w-sm">
        <Notification
          v-slot="{ notifications }"
          enter="transform ease-out duration-300 transition"
          enter-from="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-4"
          enter-to="translate-y-0 opacity-100 sm:translate-x-0"
          leave="transition ease-in duration-500"
          leave-from="opacity-100"
          leave-to="opacity-0"
          move="transition duration-500"
          move-delay="delay-300"
        >
          <div
            v-for="notification in notifications"
            :key="notification.id"
            class="flex w-full max-w-sm mx-auto mt-4 overflow-hidden bg-white rounded-lg shadow-md"
          >
            <div class="flex items-center justify-center w-12 bg-red-500">
              <svg
                class="w-6 h-6 text-white fill-current"
                viewBox="0 0 40 40"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z"
                />
              </svg>
            </div>

            <div class="px-4 py-2 -mx-3">
              <div class="mx-3">
                <span class="font-semibold text-red-500">{{
                  notification.title
                }}</span>
                <p class="text-sm text-gray-600">
                  {{ notification.text }}
                </p>
              </div>
            </div>
          </div>
        </Notification>
      </div>
    </div>
  </NotificationGroup>
</template>
<script>
import { cilArrowCircleLeft, cilSave } from '@coreui/icons'
import { typeInfoProfile } from '@/mixin/typeInfoProfile.js'
import { urlConfigMixin } from '@/mixin/urlConfigMixin.js'
import { notify } from 'notiwind'
import axios from 'axios'

export default {
  name: 'EditWebsiteInforView',
  mixins: [typeInfoProfile, urlConfigMixin],
  setup() {
    return {
      cilArrowCircleLeft,
      cilSave,
    }
  },
  data() {
    return {
      profileInfo: {
        type: '',
        content: [],
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
  methods: {
    submitForm: function (e) {
      e.preventDefault()

      /* Call to function validate data user entered */
      this.validateData()
    },

    /* Function insert field content when user click button insert Field */
    insertField: function (e) {
      e.preventDefault()
      this.elementNumber.contentElements =
        this.elementNumber.contentElements + 1
    },

    /* Function implode content to string */
    implodeContent: function (arrContent) {
      /* return arrContent */
      var strContent = ''
      for (let index = 0; index < arrContent.length; index++) {
        if (index == arrContent.length - 1) {
          strContent += arrContent[index]
        } else {
          strContent += arrContent[index] + ' &curren; '
        }
      }

      /* Call function sendData() to send server */
      let strData = {
        name: this.profileInfo.type,
        content: strContent,
        status: this.profileInfo.status,
      }
      this.sendData(strData)
    },

    /* Function validate form */
    validateData: function () {
      let validateStatus = true
      if (this.profileInfo.type == '') {
        this.errors.errorCategory = true
        validateStatus = false
      } else {
        this.errors.errorCategory = false
      }

      if (this.profileInfo.content == '') {
        this.errors.errorContent = true
        validateStatus = false
      } else {
        this.errors.errorContent = false
      }

      if (this.profileInfo.status == '') {
        this.errors.errorStatus = true
        validateStatus = false
      } else {
        this.errors.errorStatus = false
      }

      if (validateStatus == true) {
        this.implodeContent(this.profileInfo.content)
      } else {
        return false
      }
    },

    /* Function send data to server */
    sendData: async function (formDatas) {
      let sendData = await axios.post(this.serverUrl + 'infomation', formDatas)
      if (sendData) {
        if (sendData.data.status == false) {
          console.log(sendData.data)
          notify(
            {
              group: 'error',
              title: sendData.data.message,
              text: sendData.data.details.name[0],
            },
            4000,
          )
          console.log(
            sendData.data.message + ' - ' + sendData.data.details.name[0],
          )
        } else {
          this.$router.push({ name: 'ProfileInformation' })
        }
      }
    },
  },
}
</script>
<style scoped>
@import url('../../assets/css/message.css');
.textboxContent {
  margin-bottom: 10px;
}
</style>
