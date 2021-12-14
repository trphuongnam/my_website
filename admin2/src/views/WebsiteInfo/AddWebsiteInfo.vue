<template>
  <CHeader>
    <CContainer fluid>
      <CHeaderBrand href="javascript:void(0)" id="header">
        <h2>ADD WEBSITE INFORMATION</h2>
        <router-link
          class="btn btn-danger rounded-pill"
          :to="{ name: 'ListWebsite' }"
        >
          <CIcon :icon="cilArrowCircleLeft" size="xs" /> Back
        </router-link>
      </CHeaderBrand>
    </CContainer>
  </CHeader>
  <CForm>
    <div class="mb-3">
      <CFormLabel for="input_website_name">Website Name</CFormLabel>
      <CFormInput type="text" id="input_website_name" />
    </div>
    <div class="mb-3">
      <CFormLabel for="input_website_description">
        Website Description
      </CFormLabel>
      <CFormInput type="text" id="input_website_description" />
    </div>
    <div class="mb-3">
      <CFormLabel for="website_image">Website Image</CFormLabel>
      <CFormInput type="file" id="website_image" />
    </div>
    <div class="mb-3">
      <CFormLabel for="website_cv">Website CV</CFormLabel>
      <CFormInput type="file" id="website_cv" />
    </div>
    <CButton type="submit" color="primary">
      <CIcon :icon="cilSave" size="xs" /> Add
    </CButton>
  </CForm>
</template>
<script>
import { cilArrowCircleLeft, cilSave } from '@coreui/icons'
export default {
  name: 'AddWebsiteInforView',
  setup() {
    return {
      cilArrowCircleLeft,
      cilSave,
    }
  },
}
</script>
<style scoped></style>
