<template>
  <CHeader>
    <CContainer fluid>
      <CHeaderBrand href="javascript:void(0)" id="header">
        <h2>ADD SKILL</h2>
        <router-link
          class="btn btn-danger rounded-pill"
          :to="{ name: 'ListSkill' }"
        >
          <CIcon :icon="cilArrowCircleLeft" size="xs" /> Back
        </router-link>
      </CHeaderBrand>
    </CContainer>
  </CHeader>
  <CForm>
    <div class="mb-3">
      <CFormLabel for="input_website_name">Skill Name</CFormLabel>
      <CFormInput type="text" id="input_website_name" />
    </div>
    <div class="mb-3">
      <CFormLabel for="website_image">Skill Image</CFormLabel>
      <CFormInput type="file" id="website_image" />
    </div>
    <CButton type="submit" color="primary">
      <CIcon :icon="cilSave" size="xs" /> Save
    </CButton>
  </CForm>
</template>
<script>
import { cilArrowCircleLeft, cilSave } from '@coreui/icons'
export default {
  name: 'EditWebsiteInforView',
  setup() {
    return {
      cilArrowCircleLeft,
      cilSave,
    }
  },
}
</script>
<style scoped></style>
