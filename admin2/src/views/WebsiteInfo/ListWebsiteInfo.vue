<template>
  <CHeader>
    <CContainer fluid>
      <CHeaderBrand href="javascript:void(0)" id="header">
        <h2>WEBSITE INFORMATION MANAGER</h2>
        <router-link
          class="btn btn-info rounded-pill"
          :to="{ name: 'CreateWebsite' }"
        >
          <CIcon :icon="cilPlus" size="xs" /> Add
        </router-link>
      </CHeaderBrand>
    </CContainer>
  </CHeader>
  <CTable>
    <CTableHead>
      <CTableRow>
        <CTableHeaderCell scope="col">#</CTableHeaderCell>
        <CTableHeaderCell scope="col">Website Name</CTableHeaderCell>
        <CTableHeaderCell scope="col">Description</CTableHeaderCell>
        <CTableHeaderCell scope="col">Image</CTableHeaderCell>
        <CTableHeaderCell scope="col">Functions</CTableHeaderCell>
      </CTableRow>
    </CTableHead>
    <CTableBody>
      <CTableRow>
        <CTableHeaderCell scope="row">1</CTableHeaderCell>
        <CTableDataCell>Trần Phương Nam</CTableDataCell>
        <CTableDataCell>PHP Developer & Trainner</CTableDataCell>
        <CTableDataCell>@mdo</CTableDataCell>
        <CTableDataCell>
          <router-link
            class="btn btn-warning rounded-pill"
            :to="{ name: 'EditWebsite', params: { idInfo: 1 } }"
          >
            <CIcon :icon="cilPen" size="xs" /> Edit
          </router-link>
        </CTableDataCell>
      </CTableRow>
    </CTableBody>
  </CTable>
  <router-view></router-view>
</template>
<script>
import { cilPlus, cilPen } from '@coreui/icons'

export default {
  name: 'ListWebsiteInforView',
  setup() {
    return {
      cilPlus,
      cilPen,
    }
  },
}
</script>
<style scoped></style>
