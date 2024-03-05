// Extra icons

import { defineComponent } from 'vue'

export const MenuFoldLineRightIcon = defineComponent({
    setup() {
        return () => (
            <svg
                viewBox="0 0 24 24"
                stroke="currentColor"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M12 6H20M12 12H20M4 18H20M4 6L8 9L4 12"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            </svg>
        )
    },
})

export const MenuFoldLineLeftIcon = defineComponent({
    setup() {
        return () => (
            <svg
                viewBox="0 0 24 24"
                stroke="currentColor"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M12 6H20M12 12H20M4 18H20M8 6L4 9L8 12"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            </svg>
        )
    },
})

export const DashboardIcon = defineComponent({
    setup() {
        return () => (
            <svg
                viewBox="0 0 24 24"
                fill="currentColor"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path d="M5.5 12.5C5.22386 12.5 5 12.7239 5 13C5 13.2761 5.22386 13.5 5.5 13.5H7C7.27614 13.5 7.5 13.2761 7.5 13C7.5 12.7239 7.27614 12.5 7 12.5H5.5Z" />
                <path d="M6.93935 7.93935C7.13462 7.74409 7.4512 7.74409 7.64646 7.93935L8.70712 9.00001C8.90238 9.19528 8.90238 9.51186 8.70712 9.70712C8.51186 9.90238 8.19528 9.90238 8.00001 9.70712L6.93935 8.64646C6.74409 8.4512 6.74409 8.13462 6.93935 7.93935Z" />
                <path d="M17 12.5C16.7239 12.5 16.5 12.7239 16.5 13C16.5 13.2761 16.7239 13.5 17 13.5H18.5C18.7761 13.5 19 13.2761 19 13C19 12.7239 18.7761 12.5 18.5 12.5H17Z" />
                <path d="M15.4394 10.0606C15.2441 9.86538 15.2441 9.5488 15.4394 9.35354L16.5 8.29288C16.6953 8.09762 17.0119 8.09762 17.2071 8.29288C17.4024 8.48814 17.4024 8.80472 17.2071 8.99999L16.1465 10.0606C15.9512 10.2559 15.6346 10.2559 15.4394 10.0606Z" />
                <path d="M12.9661 12.741C12.9882 12.8236 13 12.9104 13 13C13 13.5523 12.5523 14 12 14C11.4477 14 11 13.5523 11 13C11 12.4477 11.4477 12 12 12C12.0896 12 12.1764 12.0118 12.259 12.0339L13 11.2929C13.1953 11.0976 13.5119 11.0976 13.7071 11.2929C13.9024 11.4881 13.9024 11.8047 13.7071 12L12.9661 12.741Z" />
                <path d="M12 8.5C11.7239 8.5 11.5 8.27614 11.5 8V6.5C11.5 6.22386 11.7239 6 12 6C12.2761 6 12.5 6.22386 12.5 6.5V8C12.5 8.27614 12.2761 8.5 12 8.5Z" />
                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M12 3C9.34784 3 6.8043 4.05357 4.92893 5.92893C3.05357 7.8043 2 10.3478 2 13C2 14.3132 2.25866 15.6136 2.7612 16.8268C3.26375 18.0401 4.00035 19.1425 4.92893 20.0711C5.11647 20.2586 5.37082 20.364 5.63604 20.364H18.364C18.6292 20.364 18.8835 20.2586 19.0711 20.0711C19.9997 19.1425 20.7362 18.0401 21.2388 16.8268C21.7413 15.6136 22 14.3132 22 13C22 10.3478 20.9464 7.8043 19.0711 5.92893C17.1957 4.05357 14.6522 3 12 3ZM6.34315 7.34315C7.84344 5.84285 9.87827 5 12 5C14.1217 5 16.1566 5.84285 17.6569 7.34315C19.1571 8.84344 20 10.8783 20 13C20 14.0506 19.7931 15.0909 19.391 16.0615C19.0406 16.9075 18.5479 17.6861 17.9353 18.364H6.06469C5.45205 17.6861 4.95938 16.9075 4.60896 16.0615C4.20693 15.0909 4 14.0506 4 13C4 10.8783 4.84285 8.84344 6.34315 7.34315Z"
                />
            </svg>
        )
    },
})

export const ArrowsInnerIcon = defineComponent({
    setup() {
        return () => (
            <svg
                viewBox="0 0 24 24"
                stroke="currentColor"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M4 4L9 9M9 9V5M9 9H5M20 4L15 9M15 9V5M15 9H19M4 20L9 15M9 15H5M9 15V19M20 20L15 15M15 15H19M15 15V19"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            </svg>
        )
    },
})

export const EmptyCircleIcon = defineComponent({
    setup() {
        return () => (
            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M20.3149 15.4442C20.7672 14.3522 21 13.1819 21 12C21 9.61305 20.0518 7.32387 18.364 5.63604C16.6761 3.94821 14.3869 3 12 3C9.61305 3 7.32387 3.94821 5.63604 5.63604C3.94821 7.32387 3 9.61305 3 12C3 13.1819 3.23279 14.3522 3.68508 15.4442C4.13738 16.5361 4.80031 17.5282 5.63604 18.364C6.47177 19.1997 7.46392 19.8626 8.55585 20.3149C9.64778 20.7672 10.8181 21 12 21C13.1819 21 14.3522 20.7672 15.4442 20.3149C16.5361 19.8626 17.5282 19.1997 18.364 18.364C19.1997 17.5282 19.8626 16.5361 20.3149 15.4442Z"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
            </svg>
        )
    },
})

export const AccountIcon = defineComponent({
    setup() {
        return () => (
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="20"
                height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
              </svg>
        )
    },
})

export const ToggleIcon = defineComponent({
    setup() {
        return () => (
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-rounded-minus p-[2px]" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z"></path>
            <path d="M9 12h6"></path>
            <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"></path>
        </svg>
        )
    },
})
export const DeleteIcon = defineComponent({
    setup() {
        return () => (
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-rounded-minus p-[2px]" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M9 12h6"></path>
            <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"></path>
        </svg>
        )
    },
})
export const EditIcon = defineComponent({
    setup() {
        return () => (
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit p-[2px]" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
            <path d="M16 5l3 3"></path>
        </svg>
        )
    },
})

export const DirectoryIcon = defineComponent({
    setup() {
        return () => (
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
        </svg>
        )
    },
})

export const AppointmentIcon = defineComponent({
    setup() {
        return () => (
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event" width="20"
            height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
            stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
            <path d="M16 3l0 4"></path>
            <path d="M8 3l0 4"></path>
            <path d="M4 11l16 0"></path>
            <path d="M8 15h2v2h-2z"></path>
        </svg>
        )
    },
})

export const ReportIcon = defineComponent({
    setup() {
        return () => (
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-analytics" width="20"
            height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
            stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
            <path d="M9 17l0 -5"></path>
            <path d="M12 17l0 -1"></path>
            <path d="M15 17l0 -3"></path>
          </svg>
        )
    },
})



export const PrintIcon = defineComponent({
    setup() {
        return () => (
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1"/>
        </svg>
        )
    },
})

export const VisitorIcon = defineComponent({
    setup() {
        return () => (
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-walk" width="20"
            height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
            stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M13 4m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
            <path d="M7 21l3 -4"></path>
            <path d="M16 21l-2 -4l-3 -3l1 -6"></path>
            <path d="M6 12l2 -3l4 -1l3 3l3 1"></path>
          </svg>
        )
    },
})

export const PatientsIcon = defineComponent({
    setup() {
        return () => (
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
          </svg>
        )
    },
})

export const ProfileIcon = defineComponent({
    setup() {
        return () => (
        <svg xmlns="http://www.w3.org/2000/svg" class="inline-flex icon icon-tabler icon-tabler-user-circle p-[2px]" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" fill="none"></path>
            <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" fill="none"></path>
            <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" fill="none"></path>
        </svg>
        )
    },
})

export const ViewIcon = defineComponent({
    setup() {
        return () => (
        <svg xmlns="http://www.w3.org/2000/svg"  class="icon icon-tabler icon-tabler-folders p-[2px]" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M9 4h3l2 2h5a2 2 0 0 1 2 2v7a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" fill="none"></path>
            <path d="M17 17v2a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2h2" fill="none"></path>
        </svg>
        )
    },
})

export const ConsultationIcon = defineComponent({
    setup() {
        return () => (
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-description p-[2px]" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
            <path d="M9 17h6"></path>
            <path d="M9 13h6"></path>
        </svg>
        )
    },
})

export const DentalIcon = defineComponent({
    setup() {
        return () => (
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dental p-[2px]" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M12 5.5c-1.074 -.586 -2.583 -1.5 -4 -1.5c-2.1 0 -4 1.247 -4 5c0 4.899 1.056 8.41 2.671 10.537c.573 .756 1.97 .521 2.567 -.236c.398 -.505 .819 -1.439 1.262 -2.801c.292 -.771 .892 -1.504 1.5 -1.5c.602 0 1.21 .737 1.5 1.5c.443 1.362 .864 2.295 1.262 2.8c.597 .759 2 .993 2.567 .237c1.615 -2.127 2.671 -5.637 2.671 -10.537c0 -3.74 -1.908 -5 -4 -5c-1.423 0 -2.92 .911 -4 1.5z" fill="none"></path>
            <path d="M12 5.5l3 1.5" fill="none"></path>
        </svg>
        )
    },
})



