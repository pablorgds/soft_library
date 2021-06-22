<template>
    <div class="d-flex align-items-center min-vh-100">
        <CContainer fluid>
            <CRow class="justify-content-center">
                <CCol md="6">
                    <CCard class="mx-4 mb-0">
                        <CCardBody class="p-4">
                            <CForm>
                                <h1>Cadastro</h1>
                                <p class="text-muted">Crie sua conta</p>
                                <CInput
                                        placeholder="Usuário"
                                        autocomplete="username"
                                        name="username"
                                        :rules="[rules.required]"
                                >
                                    <template #prepend-content>
                                        <CIcon name="cil-user"/>
                                    </template>
                                </CInput>
                                <CInput
                                        placeholder="Email"
                                        autocomplete="email"
                                        name="email"
                                        prepend="@"
                                        :rules="[rules.required, rules.email]"
                                />
                                <CInput
                                        placeholder="Senha"
                                        type="password"
                                        autocomplete="password"
                                        name="password"
                                        :rules="[rules.required]"
                                >
                                    <template #prepend-content>
                                        <CIcon name="cil-lock-locked"/>
                                    </template>
                                </CInput>
                                <CInput
                                        placeholder="Repita a senha"
                                        type="password"
                                        autocomplete="new-password"
                                        name="repeat_password"
                                        class="mb-4"
                                        :rules="[rules.required]"
                                        :error="!validRepeat()"
                                >
                                    <template #prepend-content>
                                        <CIcon name="cil-lock-locked"/>
                                    </template>
                                </CInput>
                                <CButton color="success" block>Criar minha conta</CButton>
                            </CForm>
                        </CCardBody>
                        <!--            <CCardFooter class="p-4">-->
                        <!--              <CRow>-->
                        <!--                <CCol col="6">-->
                        <!--                  <CButton block color="facebook">-->
                        <!--                    Facebook-->
                        <!--                  </CButton>-->
                        <!--                </CCol>-->
                        <!--                <CCol col="6">-->
                        <!--                  <CButton block color="twitter">-->
                        <!--                    Twitter-->
                        <!--                  </CButton>-->
                        <!--                </CCol>-->
                        <!--              </CRow>-->
                        <!--            </CCardFooter>-->
                    </CCard>
                </CCol>
            </CRow>
        </CContainer>
    </div>
</template>

<script>
    export default {
        data: () => ({
            password: '',
            repeat_password: '',
            rules: {
                required: value => !!value || "Required",
                email: value => {
                    const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    return pattern.test(value) || "Email inválido!";
                }
            }
        }),
        methods: {
            validRepeat() {
                return this.password === this.repeat_password;
            }
        }
    }
</script>
