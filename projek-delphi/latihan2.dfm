object Form1: TForm1
  Left = 322
  Top = 171
  Width = 514
  Height = 259
  Caption = 'Kalkulator Ku'
  Color = clBtnFace
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -11
  Font.Name = 'MS Sans Serif'
  Font.Style = []
  OldCreateOrder = False
  PixelsPerInch = 96
  TextHeight = 13
  object Label1: TLabel
    Left = 112
    Top = 56
    Width = 29
    Height = 13
    Caption = 'Nilai 1'
  end
  object Label2: TLabel
    Left = 112
    Top = 104
    Width = 29
    Height = 13
    Caption = 'Nilai 2'
  end
  object Label3: TLabel
    Left = 344
    Top = 56
    Width = 31
    Height = 61
    Caption = '0'
    Font.Charset = ANSI_CHARSET
    Font.Color = clWindowText
    Font.Height = -53
    Font.Name = 'Arial Rounded MT Bold'
    Font.Style = []
    ParentFont = False
  end
  object Edit1: TEdit
    Left = 160
    Top = 56
    Width = 121
    Height = 21
    TabOrder = 0
  end
  object Edit2: TEdit
    Left = 160
    Top = 104
    Width = 121
    Height = 21
    TabOrder = 1
  end
  object Button1: TButton
    Left = 184
    Top = 160
    Width = 75
    Height = 25
    Caption = 'Hasil'
    TabOrder = 2
    OnClick = Button1Click
  end
  object ComboBox1: TComboBox
    Left = 304
    Top = 8
    Width = 145
    Height = 40
    Font.Charset = BALTIC_CHARSET
    Font.Color = clWindowText
    Font.Height = -27
    Font.Name = 'MS Sans Serif'
    Font.Style = []
    ItemHeight = 32
    ParentFont = False
    TabOrder = 3
    Text = 'Operator'
    Items.Strings = (
      '+'
      '-'
      '*'
      '/')
  end
end
