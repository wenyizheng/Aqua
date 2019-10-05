# -*- coding: utf-8 -*-

# Form implementation generated from reading ui file '/home/xopowo/shower/OrderPage.ui'
#
# Created by: PyQt5 UI code generator 5.5.1
#
# WARNING! All changes made in this file will be lost!

from PyQt5 import QtCore, QtGui, QtWidgets

class Ui_Orderpage(object):
    def setupUi(self, Orderpage):
        Orderpage.setObjectName("Orderpage")
        Orderpage.resize(1280, 800)
        Orderpage.setCursor(QtGui.QCursor(QtCore.Qt.BlankCursor))
        Orderpage.setStyleSheet("")
        self.center()
        palette2 = QtGui.QPalette()
        palette2.setBrush(self.backgroundRole(),
                          QtGui.QBrush(QtGui.QPixmap('./img/278250.jpg')))  # 设置背景图片
        self.setPalette(palette2)
        self.setAutoFillBackground(True)
        self.label_8 = QtWidgets.QLabel(Orderpage)
        self.label_8.setGeometry(QtCore.QRect(9, 9, 100, 16))
        self.label_8.setMinimumSize(QtCore.QSize(100, 0))
        self.label_8.setText("")
        self.label_8.setObjectName("label_8")
        self.formLayoutWidget = QtWidgets.QWidget(Orderpage)
        self.formLayoutWidget.setGeometry(QtCore.QRect(100, 30, 908, 654))
        self.formLayoutWidget.setObjectName("formLayoutWidget")
        self.formLayout_2 = QtWidgets.QFormLayout(self.formLayoutWidget)
        self.formLayout_2.setObjectName("formLayout_2")
        self.label = QtWidgets.QLabel(self.formLayoutWidget)
        self.label.setMaximumSize(QtCore.QSize(16777215, 20))
        self.label.setStyleSheet("color:#fff;\n"
"font: 75 14pt \"Noto Serif Tamil\";")
        self.label.setObjectName("label")
        self.formLayout_2.setWidget(0, QtWidgets.QFormLayout.LabelRole, self.label)
        self.tel_tip = QtWidgets.QLabel(self.formLayoutWidget)
        self.tel_tip.setMinimumSize(QtCore.QSize(0, 18))
        self.tel_tip.setMaximumSize(QtCore.QSize(16777215, 20))
        self.tel_tip.setStyleSheet("font: 75 16pt \"Noto Serif Kannada\";\n"
"color:rgb(255, 0, 0)")
        self.tel_tip.setText("")
        self.tel_tip.setObjectName("tel_tip")
        self.formLayout_2.setWidget(3, QtWidgets.QFormLayout.LabelRole, self.tel_tip)
        self.label_2 = QtWidgets.QLabel(self.formLayoutWidget)
        self.label_2.setMaximumSize(QtCore.QSize(16777215, 20))
        self.label_2.setStyleSheet("color:#fff;\n"
"font: 75 14pt \"Noto Serif Tamil\";")
        self.label_2.setObjectName("label_2")
        self.formLayout_2.setWidget(4, QtWidgets.QFormLayout.LabelRole, self.label_2)
        self.psw_tip = QtWidgets.QLabel(self.formLayoutWidget)
        self.psw_tip.setMinimumSize(QtCore.QSize(0, 18))
        self.psw_tip.setMaximumSize(QtCore.QSize(16777215, 20))
        self.psw_tip.setStyleSheet("font: 75 16pt \"Noto Serif Kannada\";\n"
"color:rgb(255, 0, 0)")
        self.psw_tip.setText("")
        self.psw_tip.setObjectName("psw_tip")
        self.formLayout_2.setWidget(7, QtWidgets.QFormLayout.LabelRole, self.psw_tip)
        self.label_4 = QtWidgets.QLabel(self.formLayoutWidget)
        self.label_4.setMinimumSize(QtCore.QSize(0, 80))
        self.label_4.setText("")
        self.label_4.setObjectName("label_4")
        self.formLayout_2.setWidget(8, QtWidgets.QFormLayout.SpanningRole, self.label_4)
        self.gridLayout_4 = QtWidgets.QGridLayout()
        self.gridLayout_4.setObjectName("gridLayout_4")
        self.back = QtWidgets.QPushButton(self.formLayoutWidget)
        sizePolicy = QtWidgets.QSizePolicy(QtWidgets.QSizePolicy.Expanding, QtWidgets.QSizePolicy.Fixed)
        sizePolicy.setHorizontalStretch(0)
        sizePolicy.setVerticalStretch(0)
        sizePolicy.setHeightForWidth(self.back.sizePolicy().hasHeightForWidth())
        self.back.setSizePolicy(sizePolicy)
        self.back.setMinimumSize(QtCore.QSize(150, 80))
        self.back.setMaximumSize(QtCore.QSize(150, 16777215))
        self.back.setStyleSheet("background-color:rgb(75,162,248);\n"
"font: 75 26pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
        self.back.setObjectName("back")
        self.gridLayout_4.addWidget(self.back, 0, 2, 1, 1)
        self.label_5 = QtWidgets.QLabel(self.formLayoutWidget)
        self.label_5.setMinimumSize(QtCore.QSize(50, 0))
        self.label_5.setText("")
        self.label_5.setObjectName("label_5")
        self.gridLayout_4.addWidget(self.label_5, 0, 1, 1, 1)
        self.num_send = QtWidgets.QPushButton(self.formLayoutWidget)
        sizePolicy = QtWidgets.QSizePolicy(QtWidgets.QSizePolicy.Fixed, QtWidgets.QSizePolicy.Fixed)
        sizePolicy.setHorizontalStretch(0)
        sizePolicy.setVerticalStretch(0)
        sizePolicy.setHeightForWidth(self.num_send.sizePolicy().hasHeightForWidth())
        self.num_send.setSizePolicy(sizePolicy)
        self.num_send.setMinimumSize(QtCore.QSize(150, 80))
        self.num_send.setMaximumSize(QtCore.QSize(150, 16777215))
        self.num_send.setStyleSheet("background-color:rgb(75,162,248);\n"
"font: 75 26pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"outline: none;\n"
"border: 0px;\n"
"")
        self.num_send.setObjectName("num_send")
        self.gridLayout_4.addWidget(self.num_send, 0, 0, 1, 1)
        self.formLayout_2.setLayout(9, QtWidgets.QFormLayout.LabelRole, self.gridLayout_4)
        self.textEdit_2 = QtWidgets.QLineEdit(self.formLayoutWidget)
        self.textEdit_2.setMinimumSize(QtCore.QSize(450, 50))
        self.textEdit_2.setMaximumSize(QtCore.QSize(350, 50))
        self.textEdit_2.setStyleSheet("background-color:rgb(75,162,248);\n"
"font: 75 18pt \"Open Sans\";\n"
"color:#fff;\n"
"border: 0px;")
        self.textEdit_2.setText("")
        self.textEdit_2.setObjectName("textEdit_2")
        self.formLayout_2.setWidget(6, QtWidgets.QFormLayout.LabelRole, self.textEdit_2)
        self.textEdit = QtWidgets.QLineEdit(self.formLayoutWidget)
        self.textEdit.setMinimumSize(QtCore.QSize(450, 50))
        self.textEdit.setMaximumSize(QtCore.QSize(350, 50))
        self.textEdit.setStyleSheet("background-color:rgb(75,162,248);\n"
"font: 75 18pt \"Open Sans\";\n"
"color:#fff;\n"
"border: 0px;")
        self.textEdit.setText("")
        self.textEdit.setObjectName("textEdit")
        self.formLayout_2.setWidget(2, QtWidgets.QFormLayout.LabelRole, self.textEdit)
        self.cell1 = QtWidgets.QRadioButton(self.formLayoutWidget)
        self.cell1.setMinimumSize(QtCore.QSize(200, 50))
        self.cell1.setStyleSheet("font: 75 18pt \"Noto Serif Thai\";\n"
"background-color:rgb(75,162,248);\n"                                
"color:#fff;")
        self.cell1.setObjectName("cell1")
        self.formLayout_2.setWidget(11, QtWidgets.QFormLayout.LabelRole, self.cell1)
        self.cell2 = QtWidgets.QRadioButton(self.formLayoutWidget)
        self.cell2.setMinimumSize(QtCore.QSize(200, 50))
        self.cell2.setStyleSheet("font: 75 18pt \"Noto Serif Thai\";\n"
"background-color:rgb(75,162,248);\n"                                   
"color:#fff;")
        self.cell2.setObjectName("cell2")
        self.formLayout_2.setWidget(12, QtWidgets.QFormLayout.LabelRole, self.cell2)
        self.cell3 = QtWidgets.QRadioButton(self.formLayoutWidget)
        self.cell3.setMinimumSize(QtCore.QSize(200, 50))
        self.cell3.setStyleSheet("font: 75 18pt \"Noto Serif Thai\";\n"
"background-color:rgb(75,162,248);\n"  
"color:#fff;")
        self.cell3.setObjectName("cell3")
        self.formLayout_2.setWidget(13, QtWidgets.QFormLayout.LabelRole, self.cell3)
        self.cell4 = QtWidgets.QRadioButton(self.formLayoutWidget)
        self.cell4.setMinimumSize(QtCore.QSize(200, 50))
        self.cell4.setStyleSheet("font: 75 18pt \"Noto Serif Thai\";\n"
"background-color:rgb(75,162,248);\n"                                   
"color:#fff;")
        self.cell4.setObjectName("cell4")
        self.formLayout_2.setWidget(14, QtWidgets.QFormLayout.LabelRole, self.cell4)
        self.label_3 = QtWidgets.QLabel(self.formLayoutWidget)
        self.label_3.setMinimumSize(QtCore.QSize(0, 30))
        self.label_3.setText("")
        self.label_3.setObjectName("label_3")
        self.formLayout_2.setWidget(10, QtWidgets.QFormLayout.LabelRole, self.label_3)
        self.gridLayoutWidget = QtWidgets.QWidget(Orderpage)
        self.gridLayoutWidget.setGeometry(QtCore.QRect(710, 30, 500, 701))
        self.gridLayoutWidget.setObjectName("gridLayoutWidget")
        self.gridLayout_3 = QtWidgets.QGridLayout(self.gridLayoutWidget)
        self.gridLayout_3.setObjectName("gridLayout_3")
        self.num_2 = QtWidgets.QPushButton(self.gridLayoutWidget)
        self.num_2.setMinimumSize(QtCore.QSize(150, 150))
        self.num_2.setMaximumSize(QtCore.QSize(80, 16777215))
        self.num_2.setStyleSheet("background-color:rgb(75,162,248);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
        self.num_2.setObjectName("num_2")
        self.gridLayout_3.addWidget(self.num_2, 0, 1, 1, 1)
        self.num_1 = QtWidgets.QPushButton(self.gridLayoutWidget)
        self.num_1.setMinimumSize(QtCore.QSize(150, 150))
        self.num_1.setMaximumSize(QtCore.QSize(80, 16777215))
        self.num_1.setStyleSheet("background-color:rgb(75,162,248);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
        self.num_1.setObjectName("num_1")
        self.gridLayout_3.addWidget(self.num_1, 0, 0, 1, 1)
        self.num_8 = QtWidgets.QPushButton(self.gridLayoutWidget)
        self.num_8.setMinimumSize(QtCore.QSize(150, 150))
        self.num_8.setMaximumSize(QtCore.QSize(80, 16777215))
        self.num_8.setStyleSheet("background-color:rgb(75,162,248);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
        self.num_8.setObjectName("num_8")
        self.gridLayout_3.addWidget(self.num_8, 2, 1, 1, 1)
        self.num_6 = QtWidgets.QPushButton(self.gridLayoutWidget)
        self.num_6.setMinimumSize(QtCore.QSize(150, 150))
        self.num_6.setMaximumSize(QtCore.QSize(80, 16777215))
        self.num_6.setStyleSheet("background-color:rgb(75,162,248);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
        self.num_6.setObjectName("num_6")
        self.gridLayout_3.addWidget(self.num_6, 1, 2, 1, 1)
        self.num_4 = QtWidgets.QPushButton(self.gridLayoutWidget)
        self.num_4.setMinimumSize(QtCore.QSize(150, 150))
        self.num_4.setMaximumSize(QtCore.QSize(80, 16777215))
        self.num_4.setStyleSheet("background-color:rgb(75,162,248);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
        self.num_4.setObjectName("num_4")
        self.gridLayout_3.addWidget(self.num_4, 1, 0, 1, 1)
        self.num_7 = QtWidgets.QPushButton(self.gridLayoutWidget)
        self.num_7.setMinimumSize(QtCore.QSize(150, 150))
        self.num_7.setStyleSheet("background-color:rgb(75,162,248);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
        self.num_7.setObjectName("num_7")
        self.gridLayout_3.addWidget(self.num_7, 2, 0, 1, 1)
        self.num_0 = QtWidgets.QPushButton(self.gridLayoutWidget)
        self.num_0.setMinimumSize(QtCore.QSize(150, 150))
        self.num_0.setMaximumSize(QtCore.QSize(80, 16777215))
        self.num_0.setStyleSheet("background-color:rgb(75,162,248);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
        self.num_0.setObjectName("num_0")
        self.gridLayout_3.addWidget(self.num_0, 4, 1, 1, 1)
        self.num_9 = QtWidgets.QPushButton(self.gridLayoutWidget)
        self.num_9.setMinimumSize(QtCore.QSize(150, 150))
        self.num_9.setStyleSheet("background-color:rgb(75,162,248);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
        self.num_9.setObjectName("num_9")
        self.gridLayout_3.addWidget(self.num_9, 2, 2, 1, 1)
        self.num_3 = QtWidgets.QPushButton(self.gridLayoutWidget)
        self.num_3.setMinimumSize(QtCore.QSize(150, 150))
        self.num_3.setStyleSheet("background-color:rgb(75,162,248);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
        self.num_3.setObjectName("num_3")
        self.gridLayout_3.addWidget(self.num_3, 0, 2, 1, 1)
        self.num_5 = QtWidgets.QPushButton(self.gridLayoutWidget)
        self.num_5.setMinimumSize(QtCore.QSize(150, 150))
        self.num_5.setMaximumSize(QtCore.QSize(80, 16777215))
        self.num_5.setStyleSheet("background-color:rgb(75,162,248);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
        self.num_5.setObjectName("num_5")
        self.gridLayout_3.addWidget(self.num_5, 1, 1, 1, 1)
        self.num_del = QtWidgets.QPushButton(self.gridLayoutWidget)
        self.num_del.setMinimumSize(QtCore.QSize(150, 150))
        self.num_del.setStyleSheet("background-color:rgb(75,162,248);\n"
"font: 75 46pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"\n"
"outline: none;\n"
"border: 0px;\n"
"")
        self.num_del.setObjectName("num_del")
        self.gridLayout_3.addWidget(self.num_del, 4, 2, 1, 1)

        self.retranslateUi(Orderpage)
        QtCore.QMetaObject.connectSlotsByName(Orderpage)
    def retranslateUi(self, Orderpage):
        _translate = QtCore.QCoreApplication.translate
        Orderpage.setWindowTitle(_translate("Orderpage", "Form"))
        self.label.setText(_translate("Orderpage", "手机号："))
        self.label_2.setText(_translate("Orderpage", "使用密码："))
        self.back.setText(_translate("Orderpage", "返回"))
        self.num_send.setText(_translate("Orderpage", "确定"))
        self.cell1.setText(_translate("Orderpage", "      1号室"))
        self.cell2.setText(_translate("Orderpage", "      2号室"))
        self.cell3.setText(_translate("Orderpage", "      3号室"))
        self.cell4.setText(_translate("Orderpage", "      4号室"))
        self.num_2.setText(_translate("Orderpage", "2"))
        self.num_1.setText(_translate("Orderpage", "1"))
        self.num_8.setText(_translate("Orderpage", "8"))
        self.num_6.setText(_translate("Orderpage", "6"))
        self.num_4.setText(_translate("Orderpage", "4"))
        self.num_7.setText(_translate("Orderpage", "7"))
        self.num_0.setText(_translate("Orderpage", "0"))
        self.num_9.setText(_translate("Orderpage", "9"))
        self.num_3.setText(_translate("Orderpage", "3"))
        self.num_5.setText(_translate("Orderpage", "5"))
        self.num_del.setText(_translate("Orderpage", "Del"))
    def hidden(self):
        for i in range(1,5):
            eval('self.cell'+str(i)).hide()
    def unhidden(self):
        for i in range(1,5):
            eval('self.cell'+str(i)).show()

    def center(self):
        qr = self.frameGeometry()
        cp = QtWidgets.QDesktopWidget().availableGeometry().center()
        qr.moveCenter(cp)
        self.move(qr.topLeft())


import Ui.image_rc

if __name__ == "__main__":
    import sys
    app = QtWidgets.QApplication(sys.argv)
    Orderpage = QtWidgets.QWidget()
    ui = Ui_Orderpage()
    ui.setupUi(Orderpage)
    Orderpage.show()
    sys.exit(app.exec_())

