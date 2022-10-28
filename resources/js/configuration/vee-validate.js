import { configure, defineRule } from "vee-validate";
import { localize } from "@vee-validate/i18n";
import en from "@vee-validate/i18n/dist/locale/en.json";
import AllRules from "@vee-validate/rules";

configure({
    generateMessage: localize("en", en),
    validateOnInput: true,
});

Object.keys(AllRules).forEach((rule) => {
    defineRule(rule, AllRules[rule]);
});
