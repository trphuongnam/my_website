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
        aria-label="Default select example"
        :options="[
          'Select Categrory',
          { label: 'Abouts', value: 'abouts' },
          { label: 'Experients', value: 'experients' },
          { label: 'Educactions', value: 'educations' },
        ]"
      >
      </CFormSelect>
    </div>
    <div class="mb-3">
      <CFormLabel for="input_content">Contents</CFormLabel>
      <CFormTextarea id="input_content" rows="3"></CFormTextarea>
    </div>
    <div class="mb-3">
      <CFormLabel for="select_status">Status</CFormLabel>
      <CFormSelect
        id="select_status"
        aria-label="Default select example"
        :options="[
          { label: 'Enable', value: '1' },
          { label: 'Disable', value: '0' },
        ]"
      >
      </CFormSelect>
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
