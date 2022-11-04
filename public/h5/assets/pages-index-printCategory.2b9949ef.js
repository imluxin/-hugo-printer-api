import{K as e,Y as a,N as r,o as t,c as o,w as i,a as s,b as l,i as n,r as d,e as u,f as c,g as p}from"./index.59a38ac7.js";import{_ as m,b as g,a as f}from"./uni-section.ccabbb97.js";import{a as C,b as y,c as v}from"./uni-forms.fb2477d2.js";import{_ as b}from"./uni-data-select.e7f49cb2.js";var x=m({data:()=>({printerCategoryRange:[{value:1,text:"三年级诗词"}],valiFormData:{code:"",introduction:"",printerCategory:1},rules:{code:{rules:[{required:!0,errorMessage:"code 不能为空"},{format:"number",errorMessage:"code 只能输入数字"}]},printerCategory:{rules:[{required:!0,errorMessage:"打印内容不能为空"}]},introduction:{rules:[{required:!0,errorMessage:"技能不能为空"}]}}}),onLoad(){},onReady(){},methods:{submit(t){this.$refs[t].validate().then((t=>{e("log","at pages/index/printCategory.vue:77","success",t),a({url:"http://printer.imluxin.com/api/printer/printerGradeThreePoem",data:{code:t.code,printerCategory:t.printerCategory},method:"POST",success:a=>{e("log","at pages/index/printCategory.vue:89",a.data),e("log","at pages/index/printCategory.vue:90","code",a.data.msg),201==a.data.code?(e("log","at pages/index/printCategory.vue:92",a.data.msg),r({title:a.data.msg,showCancel:!1,confirmColor:"#ff4e00",success:function(a){a.confirm?e("log","at pages/index/printCategory.vue:99","用户点击确定"):a.cancel&&e("log","at pages/index/printCategory.vue:101","用户点击取消")}})):r({title:a.data.msg,showCancel:!1,success:function(a){a.confirm?e("log","at pages/index/printCategory.vue:111","用户点击确定"):a.cancel&&e("log","at pages/index/printCategory.vue:113","用户点击取消")}})}})})).catch((a=>{e("log","at pages/index/printCategory.vue:121","err",a)}))}}},[["render",function(e,a,r,m,x,h){const _=n,F=d(u("uni-card"),g),D=d(u("uni-easyinput"),C),V=d(u("uni-forms-item"),y),q=d(u("uni-data-select"),b),j=d(u("uni-forms"),v),w=c,M=p,R=d(u("uni-section"),f);return t(),o(M,{class:"container"},{default:i((()=>[s(F,{"is-shadow":!1,"is-full":""},{default:i((()=>[s(_,{class:"uni-h6"},{default:i((()=>[l("这是一台神奇的打印机。")])),_:1})])),_:1}),s(R,{title:"填写打印内容",type:"line"},{default:i((()=>[s(M,{class:"example"},{default:i((()=>[s(j,{ref:"valiForm",rules:x.rules,model:x.valiFormData,labelWidth:"80px","label-position":e.top},{default:i((()=>[s(V,{label:"Code",required:"",name:"code"},{default:i((()=>[s(D,{modelValue:x.valiFormData.code,"onUpdate:modelValue":a[0]||(a[0]=e=>x.valiFormData.code=e),placeholder:"请输入Code"},null,8,["modelValue"])])),_:1}),s(V,{label:"打印内容",required:"",name:"printerCategory"},{default:i((()=>[s(q,{modelValue:x.valiFormData.printerCategory,"onUpdate:modelValue":a[1]||(a[1]=e=>x.valiFormData.printerCategory=e),localdata:x.printerCategoryRange},null,8,["modelValue","localdata"])])),_:1})])),_:1},8,["rules","model","label-position"]),s(w,{type:"primary",onClick:a[2]||(a[2]=e=>h.submit("valiForm"))},{default:i((()=>[l("提交")])),_:1})])),_:1})])),_:1})])),_:1})}],["__scopeId","data-v-0c0410c8"]]);export{x as default};
