<template>
  <CHeader>
    <CContainer fluid>
      <CHeaderBrand href="javascript:void(0)" id="header">
        <h2>CONTACTS MANAGER</h2>
      </CHeaderBrand>
    </CContainer>
  </CHeader>
  <CTable>
    <CTableHead>
      <CTableRow>
        <CTableHeaderCell scope="col">#</CTableHeaderCell>
        <CTableHeaderCell scope="col">Person Information</CTableHeaderCell>
        <CTableHeaderCell scope="col">Contents</CTableHeaderCell>
        <CTableHeaderCell scope="col">Date Send</CTableHeaderCell>
        <CTableHeaderCell scope="col">Functions</CTableHeaderCell>
      </CTableRow>
    </CTableHead>
    <CTableBody>
      <CTableRow>
        <CTableHeaderCell scope="row">1</CTableHeaderCell>
        <CTableDataCell>
          Name: Trần Phương Nam <br />
          Phone: +84123456789 <br />
          Email: phuongnamgroupers@gmail.com <br />
        </CTableDataCell>
        <CTableDataCell>Noi dung contact</CTableDataCell>
        <CTableDataCell>2021-12-01 09:51:01</CTableDataCell>
        <CTableDataCell>
          <CButton color="success" shape="rounded-pill" class="margin_right_10">
            <CIcon :icon="cilSend" size="xs" /> Feedback
          </CButton>
          <CButton color="danger" shape="rounded-pill">
            <CIcon :icon="cilDelete" size="xs" /> Delete
          </CButton>
        </CTableDataCell>
      </CTableRow>
    </CTableBody>
  </CTable>
  <router-view></router-view>
</template>
<script>
import { cilSend, cilDelete } from '@coreui/icons'

export default {
  name: 'ListWebsiteInforView',
  setup() {
    return {
      cilSend,
      cilDelete,
    }
  },
}
</script>
<style scoped></style>
