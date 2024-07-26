import coremanagementService from "./coremanagement.service.js";

$(document).ready(function () {
    const coremanagementservice = new coremanagementService()
    coremanagementservice.getAllData();
});