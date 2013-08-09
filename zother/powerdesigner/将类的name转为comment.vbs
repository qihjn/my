Option Explicit
ValidationMode = True
InteractiveMode = im_Batch

Dim mdl ' the current model

' get the current active model
Dim Model
Set Model = ActiveModel
If (Model Is Nothing) Or (Not Model.IsKindOf(PdOOM.cls_Model)) Then
   MsgBox "The current model is not an OOM model."
Else
   ' Get the Classes collection
   Dim ModelClasses
   Set ModelClasses = Model.Classes
   Output "The model '" + Model.Name + "' contains " + CStr(ModelClasses.Count) + " classes."
   Output ""
   
   ShowProperties Model
'   Dim cls
'   set cls = ModelClasses.item(0)
'   ShowOperations cls

End If

Sub ShowProperties(package)
   ' Show classes of the current model/package
   Dim noClass
   noClass = 1
   ' For each class
   Dim cls
   For Each cls In package.Classes
      ShowClass cls, noClass
      noClass = noClass + 1
   Next
   
   ' Show classes in the sub-packages
   Dim subpackage
   For Each subpackage In package.Packages
      If Not subpackage.IsShortcut Then
         ShowProperties subpackage
      ElseIf Not subpackage.External Then
         ' Accept internal shortcut of packages
         ShowProperties subpackage
      End If
   Next
   
End Sub

Sub ShowClass(cls, noClass)
   If IsObject(cls) Then
      Dim bShortcutClosed
      bShortcutClosed = false
      If cls.IsShortcut Then
      	 If Not (cls.TargetObject Is Nothing) Then
            ' Show properties of the target class
            Set cls = cls.TargetObject
         Else
            ' The target model is not opened (closed or not found)
            bShortcutClosed = true
         End If
      End If
   
      ' Show properties
      Output "================================"
      Output "Class " + CStr(noClass) + ":"
      Output "================================"
      If Not bShortcutClosed Then
      		cls.Comment = cls.Name
      
      

         ' Show attributes
         ShowAttributes cls

         ' Show operations
         ShowOperations cls
      Else
         Output "The target class of the shortcut " + cls.Code + " is not accessible."
         Output ""
      End If
   End If
End Sub


'-----------------------------------------------------------------------------
' Show class attributes
'-----------------------------------------------------------------------------
Sub ShowAttributes(cls)
   Dim noAttr
   noAttr = 1
   If IsObject(cls) Then
      Dim attr
      For Each attr In cls.Attributes
         If Not attr.IsShortcut Then
         	
         		attr.Comment = attr.Name
           
         End If
      Next
   End If
End Sub

Sub ShowOperations(cls)
   Dim noOper
   noOper = 1
   If IsObject(cls) Then
      Dim oper
      For Each oper In cls.Operations
         'If Not oper.IsShortcut Then
           
          if oper.comment="" then
  				
  				oper.comment = oper.Name
  				end if

         'End If
      Next
   End If
End Sub
