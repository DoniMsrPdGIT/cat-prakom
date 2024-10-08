   BPLG   ��  �1  abdccddb7534                                                                                           P�  �         position
       _uposition                                                  ����    ����            ����                        ����    R�  �         color       _ucolor                                                 ����    ����            ����                        ����   P�  �  
       localCoord       _ulocalCoord                                                 ����    ����            ����                        ����          R�  �         sk_RTAdjust       _usk_RTAdjust                                          ����    ����    ����            ����                        ������������    ������������                               [�  �         umatrix_S1_c0       _uumatrix_S1_c0                                          ����    ����    ����            ����                        ������������    ������������                               P�  �  
       u_skRTFlip       _uu_skRTFlip                                          ����    ����    ����            ����                        ������������    ������������                               R�  �         ucircle_S2_c0       _uucircle_S2_c0                                          ����    ����    ����            ����                        ������������    ������������                               R�  �  
       ucircle_S2       _uucircle_S2                                          ����    ����    ����            ����                        ������������    ������������                               ^�             uTextureSampler_0_S1       _uuTextureSampler_0_S1                                          ����    ����    ����            ����                        ������������    ������������                                                               ��         R�  �         gl_FragColor       gl_FragColor                                          ����    ����    ����            ����                        ������������                                                          ^�                                          ����                                                                                          ��  
  <�	    �                ����������������������������������������������������                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ��������������������              ��������������������           ����������������    ����           ����������������   ����           ����������������   ����          ����������������    ����                       e      struct VS_OUTPUT
{
    float4 dx_Position : SV_Position;
    float4 gl_Position : TEXCOORD2;
    float4 gl_FragCoord : TEXCOORD3;
    float4 v0 : TEXCOORD0;
    float2 v1 : TEXCOORD1;
};
#pragma warning( disable: 3556 3571 )
float3 vec3_ctor(float2 x0, float x1)
{
    return float3(x0, x1);
}
float4 vec4_ctor(float2 x0, float x1, float x2)
{
    return float4(x0, x1, x2);
}
// Uniforms

uniform float4 _sk_RTAdjust : register(c0);
uniform float3x3 _umatrix_S1_c0 : register(c1);
#ifdef ANGLE_ENABLE_LOOP_FLATTEN
#define LOOP [loop]
#define FLATTEN [flatten]
#else
#define LOOP
#define FLATTEN
#endif

#define ATOMIC_COUNTER_ARRAY_STRIDE 4

// Attributes
static float2 _position = {0, 0};
static float4 _color = {0, 0, 0, 0};
static float2 _localCoord = {0, 0};

static float4 gl_Position = float4(0, 0, 0, 0);

// Varyings
static  float4 _vcolor_S0 = {0, 0, 0, 0};
static  float2 _vTransformedCoords_3_S0 = {0, 0};

cbuffer DriverConstants : register(b1)
{
    float4 dx_ViewAdjust : packoffset(c1);
    float2 dx_ViewCoords : packoffset(c2);
    float2 dx_ViewScale  : packoffset(c3);
    float clipControlOrigin : packoffset(c3.w);
    float clipControlZeroToOne : packoffset(c4);
};

@@ VERTEX ATTRIBUTES @@

VS_OUTPUT generateOutput(VS_INPUT input)
{
    VS_OUTPUT output;
    output.gl_Position = gl_Position;
    output.dx_Position.x = gl_Position.x;
    output.dx_Position.y = clipControlOrigin * gl_Position.y;
    if (clipControlZeroToOne)
    {
        output.dx_Position.z = gl_Position.z;
    } else {
        output.dx_Position.z = (gl_Position.z + gl_Position.w) * 0.5;
    }
    output.dx_Position.w = gl_Position.w;
    output.gl_FragCoord = gl_Position;
    output.v0 = _vcolor_S0;
    output.v1 = _vTransformedCoords_3_S0;

    return output;
}

VS_OUTPUT main(VS_INPUT input){
    initAttributes(input);

(_vcolor_S0 = _color);
(gl_Position = vec4_ctor(_position, 0.0, 1.0));
{
(_vTransformedCoords_3_S0 = mul(transpose(_umatrix_S1_c0)