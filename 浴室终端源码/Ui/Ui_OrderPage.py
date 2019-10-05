# -*- coding: utf-8 -*-

# Form implementation generated from reading ui file '/home/xopowo/shower/OrderPage.ui'
#
# Created by: PyQt5 UI code generator 5.5.1
#
# WARNING! All changes made in this file will be lost!

from PyQt5 import QtCore, QtGui, QtWidgets

class Ui_Orderpage(object):
    def setupUi(self, Orderpage):
        self.__desktop = QtWidgets.QApplication.desktop()
        qRect = self.__desktop.screenGeometry()
        
        Orderpage.setObjectName("Orderpage")
        Orderpage.setCursor(QtGui.QCursor(QtCore.Qt.BlankCursor))
        Orderpage.resize(qRect.width(), qRect.height())
        print(qRect.width(), qRect.height())
        Orderpage.setStyleSheet("")
        self.center()  
        palette2 = QtGui.QPalette()
        palette2.setBrush(self.backgroundRole(),
                          QtGui.QBrush(QtGui.QPixmap('./img/background.png')))  # 设置背景图片
        self.setPalette(palette2)
        self.setAutoFillBackground(True)
        self.horizontalLayout = QtWidgets.QHBoxLayout(Orderpage)
        self.horizontalLayout.setObjectName("horizontalLayout")
        self.label_8 = QtWidgets.QLabel(Orderpage)
        self.label_8.setMinimumSize(QtCore.QSize(100, 0))
        self.label_8.setText("")
        self.label_8.setObjectName("label_8")
        self.horizontalLayout.addWidget(self.label_8)
        self.verticalLayout_3 = QtWidgets.QVBoxLayout()
        self.verticalLayout_3.setObjectName("verticalLayout_3")
        self.verticalLayout = QtWidgets.QVBoxLayout()
        self.verticalLayout.setObjectName("verticalLayout")
        self.label = QtWidgets.QLabel(Orderpage)
        self.label.setMaximumSize(QtCore.QSize(16777215, 20))
        self.label.setStyleSheet("color:#fff;\n"
"font: 75 14pt \"Noto Serif Tamil\";")
        self.label.setObjectName("label")
        self.verticalLayout.addWidget(self.label)
        self.textEdit = QtWidgets.QLineEdit(Orderpage)
        self.textEdit.setMinimumSize(QtCore.QSize(300, 0))
        self.textEdit.setMaximumSize(QtCore.QSize(350, 50))
        self.textEdit.setObjectName("textEdit")
        self.verticalLayout.addWidget(self.textEdit)
        self.tel_tip = QtWidgets.QLabel(Orderpage)
        self.tel_tip.setMinimumSize(QtCore.QSize(0, 18))
        self.tel_tip.setMaximumSize(QtCore.QSize(16777215, 20))
        self.tel_tip.setStyleSheet("font: 75 16pt \"Noto Serif Kannada\";\n"
                                   "color:rgb(255,0,0)")
        self.tel_tip.setObjectName("tel_tip")
        self.verticalLayout.addWidget(self.tel_tip)
        self.label_2 = QtWidgets.QLabel(Orderpage)
        self.label_2.setMaximumSize(QtCore.QSize(16777215, 20))
        self.label_2.setStyleSheet("color:#fff;\n"
"font: 75 14pt \"Noto Serif Tamil\";")
        self.label_2.setObjectName("label_2")
        self.verticalLayout.addWidget(self.label_2)
        self.textEdit_2 = QtWidgets.QLineEdit(Orderpage)
        self.textEdit_2.setMinimumSize(QtCore.QSize(300, 0))
        self.textEdit_2.setMaximumSize(QtCore.QSize(350, 50))
        self.textEdit_2.setObjectName("textEdit_2")
        self.verticalLayout.addWidget(self.textEdit_2)
        self.psw_tip = QtWidgets.QLabel(Orderpage)
        self.psw_tip.setMinimumSize(QtCore.QSize(0, 18))
        self.psw_tip.setMaximumSize(QtCore.QSize(16777215, 20))
        self.psw_tip.setStyleSheet("font: 75 16pt \"Noto Serif Kannada\";\n"
                                   "color:rgb(255,0,0)")
        self.psw_tip.setObjectName("psw_tip")
        self.verticalLayout.addWidget(self.psw_tip)
        self.verticalLayout_2 = QtWidgets.QVBoxLayout()
        self.verticalLayout_2.setObjectName("verticalLayout_2")
        self.label_3 = QtWidgets.QLabel(Orderpage)
        self.label_3.setMaximumSize(QtCore.QSize(16777215, 20))
        self.label_3.setText("")
        self.label_3.setObjectName("label_3")
        self.verticalLayout_2.addWidget(self.label_3)
        self.cell1 = QtWidgets.QRadioButton(Orderpage)
        self.cell1.setStyleSheet("color:#fff;\n"
"font: 75 24pt \"Noto Serif Tamil\";")
        self.cell1.setObjectName("cell1")
        self.verticalLayout_2.addWidget(self.cell1)
        self.label_4 = QtWidgets.QLabel(Orderpage)
        self.label_4.setMaximumSize(QtCore.QSize(16777215, 20))
        self.label_4.setText("")
        self.label_4.setObjectName("label_4")
        self.verticalLayout_2.addWidget(self.label_4)
        self.cell2 = QtWidgets.QRadioButton(Orderpage)
        self.cell2.setStyleSheet("color:#fff;\n"
"font: 75 24pt \"Noto Serif Tamil\";")
        self.cell2.setObjectName("cell2")
        self.verticalLayout_2.addWidget(self.cell2)
        self.label_5 = QtWidgets.QLabel(Orderpage)
        self.label_5.setMaximumSize(QtCore.QSize(16777215, 20))
        self.label_5.setText("")
        self.label_5.setObjectName("label_5")
        self.verticalLayout_2.addWidget(self.label_5)
        self.cell3 = QtWidgets.QRadioButton(Orderpage)
        self.cell3.setStyleSheet("color:#fff;\n"
"font: 75 24pt \"Noto Serif Tamil\";")
        self.cell3.setObjectName("cell3")
        self.verticalLayout_2.addWidget(self.cell3)
        self.label_6 = QtWidgets.QLabel(Orderpage)
        self.label_6.setMaximumSize(QtCore.QSize(16777215, 20))
        self.label_6.setText("")
        self.label_6.setObjectName("label_6")
        self.verticalLayout_2.addWidget(self.label_6)
        self.cell4 = QtWidgets.QRadioButton(Orderpage)
        self.cell4.setStyleSheet("color:#fff;\n"
"font: 75 24pt \"Noto Serif Tamil\";")
        self.cell4.setObjectName("cell4")
        self.verticalLayout_2.addWidget(self.cell4)
        self.verticalLayout.addLayout(self.verticalLayout_2)
        self.verticalLayout_3.addLayout(self.verticalLayout)
        self.horizontalLayout.addLayout(self.verticalLayout_3)
        self.label_7 = QtWidgets.QLabel(Orderpage)
        self.label_7.setMinimumSize(QtCore.QSize(100, 0))
        self.label_7.setText("")
        self.label_7.setObjectName("label_7")
        self.horizontalLayout.addWidget(self.label_7)
        self.gridLayout = QtWidgets.QGridLayout()
        self.gridLayout.setContentsMargins(0, 130, 0, 100)
        self.gridLayout.setObjectName("gridLayout")
        self.label_9 = QtWidgets.QLabel(Orderpage)
        self.label_9.setMinimumSize(QtCore.QSize(0, 50))
        self.label_9.setMaximumSize(QtCore.QSize(16777215, 60))
        self.label_9.setText("")
        self.label_9.setObjectName("label_9")
        self.gridLayout.addWidget(self.label_9, 1, 0, 1, 1)
        self.label_10 = QtWidgets.QLabel(Orderpage)
        self.label_10.setMinimumSize(QtCore.QSize(80, 0))
        self.label_10.setMaximumSize(QtCore.QSize(80, 16777215))
        self.label_10.setText("")
        self.label_10.setObjectName("label_10")
        self.gridLayout.addWidget(self.label_10, 2, 1, 1, 1)
        self.label_13 = QtWidgets.QLabel(Orderpage)
        self.label_13.setMinimumSize(QtCore.QSize(0, 50))
        self.label_13.setMaximumSize(QtCore.QSize(16777215, 60))
        self.label_13.setText("")
        self.label_13.setObjectName("label_13")
        self.gridLayout.addWidget(self.label_13, 3, 0, 1, 1)
        self.num_9 = QtWidgets.QPushButton(Orderpage)
        self.num_9.setMinimumSize(QtCore.QSize(80, 80))
        self.num_9.setStyleSheet("background-color:rgba(0,0,0,13%);\n"
"font: 75 26pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"border-radius:40px;\n"
"outline: none;\n"
"border: 2px solid;\n"
"border-color:rgba(225,225,225)")
        self.num_9.setObjectName("num_9")
        self.gridLayout.addWidget(self.num_9, 4, 4, 1, 1)
        self.label_14 = QtWidgets.QLabel(Orderpage)
        self.label_14.setMinimumSize(QtCore.QSize(0, 50))
        self.label_14.setMaximumSize(QtCore.QSize(16777215, 60))
        self.label_14.setText("")
        self.label_14.setObjectName("label_14")
        self.gridLayout.addWidget(self.label_14, 5, 0, 1, 1)
        self.label_15 = QtWidgets.QLabel(Orderpage)
        self.label_15.setMinimumSize(QtCore.QSize(0, 50))
        self.label_15.setMaximumSize(QtCore.QSize(16777215, 60))
        self.label_15.setText("")
        self.label_15.setObjectName("label_15")
        self.gridLayout.addWidget(self.label_15, 7, 2, 1, 1)
        self.num_1 = QtWidgets.QPushButton(Orderpage)
        self.num_1.setMinimumSize(QtCore.QSize(0, 80))
        self.num_1.setMaximumSize(QtCore.QSize(80, 16777215))
        self.num_1.setStyleSheet("background-color:rgba(0,0,0,13%);\n"
"font: 75 26pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"border-radius:40px;\n"
"outline: none;\n"
"border: 2px solid;\n"
"border-color:rgba(225,225,225)")
        self.num_1.setObjectName("num_1")
        self.gridLayout.addWidget(self.num_1, 0, 0, 1, 1)
        self.num_5 = QtWidgets.QPushButton(Orderpage)
        self.num_5.setMinimumSize(QtCore.QSize(80, 80))
        self.num_5.setMaximumSize(QtCore.QSize(80, 16777215))
        self.num_5.setStyleSheet("background-color:rgba(0,0,0,13%);\n"
"font: 75 26pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"border-radius:40px;\n"
"outline: none;\n"
"border: 2px solid;\n"
"border-color:rgba(225,225,225)")
        self.num_5.setObjectName("num_5")
        self.gridLayout.addWidget(self.num_5, 2, 2, 1, 1)
        self.num_6 = QtWidgets.QPushButton(Orderpage)
        self.num_6.setMinimumSize(QtCore.QSize(0, 80))
        self.num_6.setMaximumSize(QtCore.QSize(80, 16777215))
        self.num_6.setStyleSheet("background-color:rgba(0,0,0,13%);\n"
"font: 75 26pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"border-radius:40px;\n"
"outline: none;\n"
"border: 2px solid;\n"
"border-color:rgba(225,225,225)")
        self.num_6.setObjectName("num_6")
        self.gridLayout.addWidget(self.num_6, 2, 4, 1, 1)
        self.num_8 = QtWidgets.QPushButton(Orderpage)
        self.num_8.setMinimumSize(QtCore.QSize(0, 80))
        self.num_8.setMaximumSize(QtCore.QSize(80, 16777215))
        self.num_8.setStyleSheet("background-color:rgba(0,0,0,13%);\n"
"font: 75 26pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"border-radius:40px;\n"
"outline: none;\n"
"border: 2px solid;\n"
"border-color:rgba(225,225,225)")
        self.num_8.setObjectName("num_8")
        self.gridLayout.addWidget(self.num_8, 4, 2, 1, 1)
        self.num_send = QtWidgets.QPushButton(Orderpage)
        self.num_send.setMinimumSize(QtCore.QSize(0, 80))
        self.num_send.setMaximumSize(QtCore.QSize(80, 16777215))
        self.num_send.setStyleSheet("background-color:rgba(0,0,0,13%);\n"
"font: 75 26pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"border-radius:40px;\n"
"outline: none;\n"
"border: 2px solid;\n"
"border-color:rgba(225,225,225)")
        self.num_send.setObjectName("num_send")
        self.gridLayout.addWidget(self.num_send, 6, 4, 1, 1)
        self.num_4 = QtWidgets.QPushButton(Orderpage)
        self.num_4.setMinimumSize(QtCore.QSize(80, 80))
        self.num_4.setMaximumSize(QtCore.QSize(80, 16777215))
        self.num_4.setStyleSheet("background-color:rgba(0,0,0,13%);\n"
"font: 75 26pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"border-radius:40px;\n"
"outline: none;\n"
"border: 2px solid;\n"
"border-color:rgba(225,225,225)")
        self.num_4.setObjectName("num_4")
        self.gridLayout.addWidget(self.num_4, 2, 0, 1, 1)
        self.num_7 = QtWidgets.QPushButton(Orderpage)
        self.num_7.setMinimumSize(QtCore.QSize(0, 80))
        self.num_7.setStyleSheet("background-color:rgba(0,0,0,13%);\n"
"font: 75 26pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"border-radius:40px;\n"
"outline: none;\n"
"border: 2px solid;\n"
"border-color:rgba(225,225,225)")
        self.num_7.setObjectName("num_7")
        self.gridLayout.addWidget(self.num_7, 4, 0, 1, 1)
        self.num_del = QtWidgets.QPushButton(Orderpage)
        self.num_del.setMinimumSize(QtCore.QSize(0, 80))
        self.num_del.setMaximumSize(QtCore.QSize(16777215, 80))
        self.num_del.setStyleSheet("background-color:rgba(0,0,0,13%);\n"
"font: 75 26pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"border-radius:40px;\n"
"outline: none;\n"
"border: 2px solid;\n"
"border-color:rgba(225,225,225)")
        self.num_del.setObjectName("num_del")
        self.gridLayout.addWidget(self.num_del, 6, 0, 1, 1)
        self.num_0 = QtWidgets.QPushButton(Orderpage)
        self.num_0.setMinimumSize(QtCore.QSize(0, 80))
        self.num_0.setMaximumSize(QtCore.QSize(80, 16777215))
        self.num_0.setStyleSheet("background-color:rgba(0,0,0,13%);\n"
"font: 75 26pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"border-radius:40px;\n"
"outline: none;\n"
"border: 2px solid;\n"
"border-color:rgba(225,225,225)")
        self.num_0.setObjectName("num_0")
        self.gridLayout.addWidget(self.num_0, 6, 2, 1, 1)
        self.num_3 = QtWidgets.QPushButton(Orderpage)
        self.num_3.setMinimumSize(QtCore.QSize(80, 80))
        self.num_3.setMaximumSize(QtCore.QSize(80, 80))
        self.num_3.setStyleSheet("background-color:rgba(0,0,0,13%);\n"
"font: 75 26pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"border-radius:40px;\n"
"outline: none;\n"
"border: 2px solid;\n"
"border-color:rgba(225,225,225)")
        self.num_3.setObjectName("num_3")
        self.gridLayout.addWidget(self.num_3, 0, 4, 1, 1)
        self.label_11 = QtWidgets.QLabel(Orderpage)
        self.label_11.setMinimumSize(QtCore.QSize(80, 0))
        self.label_11.setText("")
        self.label_11.setObjectName("label_11")
        self.gridLayout.addWidget(self.label_11, 2, 3, 1, 1)
        self.num_2 = QtWidgets.QPushButton(Orderpage)
        self.num_2.setMinimumSize(QtCore.QSize(0, 80))
        self.num_2.setMaximumSize(QtCore.QSize(80, 16777215))
        self.num_2.setStyleSheet("background-color:rgba(0,0,0,13%);\n"
"font: 75 26pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"border-radius:40px;\n"
"outline: none;\n"
"border: 2px solid;\n"
"border-color:rgba(225,225,225)")
        self.num_2.setObjectName("num_2")
        self.gridLayout.addWidget(self.num_2, 0, 2, 1, 1)
        self.back = QtWidgets.QPushButton(Orderpage)
        self.back.setMinimumSize(QtCore.QSize(80, 80))
        self.back.setMaximumSize(QtCore.QSize(80, 16777215))
        self.back.setStyleSheet("background-color:rgba(0,0,0,13%);\n"
"font: 75 26pt \"Noto Serif Thai\";\n"
"color:#fff;\n"
"border-radius:40px;\n"
"outline: none;\n"
"border: 2px solid;\n"
"border-color:rgba(225,225,225)")
        self.back.setObjectName("back")
        self.gridLayout.addWidget(self.back, 8, 2, 1, 1)
        self.horizontalLayout.addLayout(self.gridLayout)
        self.label_12 = QtWidgets.QLabel(Orderpage)
        self.label_12.setMinimumSize(QtCore.QSize(100, 0))
        self.label_12.setText("")
        self.label_12.setObjectName("label_12")
        self.horizontalLayout.addWidget(self.label_12)

        self.retranslateUi(Orderpage)
        QtCore.QMetaObject.connectSlotsByName(Orderpage)

    def retranslateUi(self, Orderpage):
        _translate = QtCore.QCoreApplication.translate
        Orderpage.setWindowTitle(_translate("Orderpage", "Form"))
        self.label.setText(_translate("Orderpage", "手机号："))
        #self.tel_tip.setText(_translate("Orderpage", "TextLabel"))
        self.label_2.setText(_translate("Orderpage", "使用密码："))
        #self.psw_tip.setText(_translate("Orderpage", "TextLabel"))
        self.cell1.setText(_translate("Orderpage", "1号室"))
        self.cell2.setText(_translate("Orderpage", "2号室"))
        self.cell3.setText(_translate("Orderpage", "3号室"))
        self.cell4.setText(_translate("Orderpage", "4号室"))
        self.num_9.setText(_translate("Orderpage", "9"))
        self.num_1.setText(_translate("Orderpage", "1"))
        self.num_5.setText(_translate("Orderpage", "5"))
        self.num_6.setText(_translate("Orderpage", "6"))
        self.num_8.setText(_translate("Orderpage", "8"))
        self.num_send.setText(_translate("Orderpage", "确定"))
        self.num_4.setText(_translate("Orderpage", "4"))
        self.num_7.setText(_translate("Orderpage", "7"))
        self.num_del.setText(_translate("Orderpage", "Del"))
        self.num_0.setText(_translate("Orderpage", "0"))
        self.num_3.setText(_translate("Orderpage", "3"))
        self.num_2.setText(_translate("Orderpage", "2"))
        self.back.setText(_translate("Orderpage", "返回"))
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

