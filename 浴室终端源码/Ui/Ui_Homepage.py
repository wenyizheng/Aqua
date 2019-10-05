# -*- coding: utf-8 -*-

# Form implementation generated from reading ui file '/home/xopowo/shower/Homepage.ui'
#
# Created by: PyQt5 UI code generator 5.5.1
#
# WARNING! All changes made in this file will be lost!

from PyQt5 import QtCore, QtGui, QtWidgets

class Ui_Homepage(object):
    def setupUi(self, Homepage):
        Homepage.setObjectName("Homepage")
        Homepage.resize(1639, 897)
        Homepage.setCursor(QtGui.QCursor(QtCore.Qt.BlankCursor))
        palette1 = QtGui.QPalette()
        palette1.setBrush(self.backgroundRole(),
                          QtGui.QBrush(QtGui.QPixmap('./img/background.png')))  # 设置背景图片
        self.setPalette(palette1)
        self.setAutoFillBackground(True)  # 不设置也可以
        self.gridLayout_2 = QtWidgets.QGridLayout(Homepage)
        self.gridLayout_2.setObjectName("gridLayout_2")
        self.logo = QtWidgets.QLabel(Homepage)
        self.logo.setMinimumSize(QtCore.QSize(200, 80))
        self.logo.setMaximumSize(QtCore.QSize(200, 60))
        self.logo.setStyleSheet("image:url(:/img/aqua.png)")
        self.logo.setText("")
        self.logo.setObjectName("logo")
        self.gridLayout_2.addWidget(self.logo, 0, 1, 1, 1)
        self.label = QtWidgets.QLabel(Homepage)
        self.label.setText("")
        self.label.setObjectName("label")
        self.gridLayout_2.addWidget(self.label, 2, 6, 1, 1)
        self.label_2 = QtWidgets.QLabel(Homepage)
        self.label_2.setMaximumSize(QtCore.QSize(250, 16777215))
        self.label_2.setText("")
        self.label_2.setObjectName("label_2")
        self.gridLayout_2.addWidget(self.label_2, 2, 8, 1, 1)
        self.label_3 = QtWidgets.QLabel(Homepage)
        self.label_3.setMaximumSize(QtCore.QSize(100, 16777215))
        self.label_3.setObjectName("label_3")
        self.gridLayout_2.addWidget(self.label_3, 2, 0, 1, 1)
        self.gridLayout = QtWidgets.QGridLayout()
        self.gridLayout.setObjectName("gridLayout")
        self.use_help = QtWidgets.QPushButton(Homepage)
        self.use_help.setMaximumSize(QtCore.QSize(250, 16777215))
        self.use_help.setStyleSheet("background-color:rgb(58,116,94);\n"
"color:#fff;\n"
"font: 75 26pt \\\"Noto Serif Thai\\\";\n"
"border-radius:25px;\n"
"height:80px;\n"
"background-color:rgb(0,0,0,15%);\n"
"border: 2px solid;\n"
"border-color:rgb(170, 170, 170)")
        self.use_help.setObjectName("use_help")
        self.gridLayout.addWidget(self.use_help, 3, 0, 1, 1)
        self.over_order = QtWidgets.QPushButton(Homepage)
        self.over_order.setMaximumSize(QtCore.QSize(250, 16777215))
        self.over_order.setStyleSheet("\n"
"color:#fff;\n"
"font: 75 26pt \\\"Noto Serif Thai\\\";\n"
"border-radius:25px;\n"
"height:80px;\n"
"background-color:rgb(0,0,0,15%);\n"
"border: 2px solid;\n"
"border-color:rgb(170, 170, 170)")
        self.over_order.setObjectName("over_order")
        self.gridLayout.addWidget(self.over_order, 0, 0, 1, 1)
        self.not_order = QtWidgets.QPushButton(Homepage)
        self.not_order.setMaximumSize(QtCore.QSize(250, 16777215))
        self.not_order.setStyleSheet("background-color:rgb(58,116,94);\n"
"color:#fff;\n"
"font: 75 26pt \\\"Noto Serif Thai\\\";\n"
"border-radius:25px;\n"
"height:80px;\n"
"background-color:rgb(0,0,0,15%);\n"
"border: 2px solid;\n"
"border-color:rgb(170, 170, 170)")
        self.not_order.setObjectName("not_order")
        self.gridLayout.addWidget(self.not_order, 1, 0, 1, 1)
        self.user_info = QtWidgets.QPushButton(Homepage)
        self.user_info.setMaximumSize(QtCore.QSize(250, 16777215))
        self.user_info.setStyleSheet("background-color:rgb(58,116,94);\n"
"color:#fff;\n"
"font: 75 26pt \\\"Noto Serif Thai\\\";\n"
"border-radius:25px;\n"
"height:80px;\n"
"background-color:rgb(0,0,0,15%);\n"
"border: 2px solid;\n"
"border-color:rgb(170, 170, 170)")
        self.user_info.setObjectName("user_info")
        self.gridLayout.addWidget(self.user_info, 2, 0, 1, 1)
        self.gridLayout_2.addLayout(self.gridLayout, 2, 7, 1, 1)
        self.textBrowser = QtWidgets.QTextBrowser(Homepage)
        self.textBrowser.setMaximumSize(QtCore.QSize(700, 16777215))
        #self.textBrowser.setMinimumSize(QtCore.QSize(700, 620))
        self.textBrowser.setStyleSheet("font: 22pt \"Noto Serif Thai\";\n"
"background-color:rgba(0,0,0,0.1);\n"
"color:#fff")
        self.textBrowser.setObjectName("textBrowser")
        self.gridLayout_2.addWidget(self.textBrowser, 2, 1, 1, 1)
        self.nowTimer = QtWidgets.QLabel(Homepage)
        self.nowTimer.setMinimumSize(QtCore.QSize(0, 45))
        self.nowTimer.setMaximumSize(QtCore.QSize(16777215, 80))
        self.nowTimer.setStyleSheet("font: 75 18pt \"Noto Serif Telugu\";\n"
"color:rgb(255, 0, 0)")
        self.nowTimer.setObjectName("nowTimer")
        self.gridLayout_2.addWidget(self.nowTimer, 1, 1, 1, 1)

        self.retranslateUi(Homepage)
        QtCore.QMetaObject.connectSlotsByName(Homepage)

    def retranslateUi(self, Homepage):
        _translate = QtCore.QCoreApplication.translate
        Homepage.setWindowTitle(_translate("Homepage", "Form"))
        #self.label_3.setText(_translate("Homepage", "sdsdsdsds"))
        self.use_help.setText(_translate("Homepage", "    打开柜子    "))
        self.over_order.setText(_translate("Homepage", "    开始洗浴    "))
        self.not_order.setText(_translate("Homepage", "    结束洗浴    "))
        self.user_info.setText(_translate("Homepage", "    现场预约    "))
        self.textBrowser.setHtml(_translate("Homepage", "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0//EN\" \"http://www.w3.org/TR/REC-html40/strict.dtd\">\n"
"<html><head><meta name=\"qrichtext\" content=\"1\" /><style type=\"text/css\">\n"
"p, li { white-space: pre-wrap; }\n"
"</style></head><body style=\" font-family:\'Noto Serif Thai\'; font-size:22pt; font-weight:400; font-style:normal;\">\n"
"<p style=\" margin-top:0px; margin-bottom:0px; margin-left:0px; margin-right:0px; -qt-block-indent:0; cursor:crosshair; text-indent:0px;\">哈拉秀：11:00--12:00</p></body></html>"))
        self.nowTimer.setText(_translate("Homepage", "123123"))

import Ui.image_rc

if __name__ == "__main__":
    import sys
    app = QtWidgets.QApplication(sys.argv)
    Homepage = QtWidgets.QWidget()
    ui = Ui_Homepage()
    ui.setupUi(Homepage)
    Homepage.show()
    sys.exit(app.exec_())

