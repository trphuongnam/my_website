export default [
  {
    component: 'CNavItem',
    name: 'Dashboard',
    to: '/dashboard',
    icon: 'cil-speedometer',
    badge: {
      color: 'primary',
      text: 'NEW',
    },
  },
  {
    component: 'CNavGroup',
    name: 'Website',
    to: '/website-manage',
    icon: 'cil-settings',
    items: [
      {
        component: 'CNavItem',
        name: 'Website Information',
        to: '/website-manage',
      },
    ],
  },
  {
    component: 'CNavGroup',
    name: 'Profiles Manage',
    to: '/information-manage',
    icon: 'cil-settings',
    items: [
      {
        component: 'CNavItem',
        name: 'Profiles',
        to: '/information-manage/',
      },
    ],
  },
  {
    component: 'CNavGroup',
    name: 'Skills Manage',
    to: '/skill-manage',
    icon: 'cil-settings',
    items: [
      {
        component: 'CNavItem',
        name: 'Skills',
        to: '/skill-manage',
      },
    ],
  },
  {
    component: 'CNavGroup',
    name: 'Contact Manage',
    to: '/contact-manage',
    icon: 'cil-settings',
    items: [
      {
        component: 'CNavItem',
        name: 'List Contacts',
        to: '/contact-manage',
      },
    ],
  },
  // List menu defined
]
