namespace LeaveApplication
{
    partial class ApplyLeave
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.leavetype = new System.Windows.Forms.ComboBox();
            this.label1 = new System.Windows.Forms.Label();
            this.label2 = new System.Windows.Forms.Label();
            this.reason_txt = new System.Windows.Forms.TextBox();
            this.label3 = new System.Windows.Forms.Label();
            this.from_date = new System.Windows.Forms.DateTimePicker();
            this.to_date = new System.Windows.Forms.DateTimePicker();
            this.label4 = new System.Windows.Forms.Label();
            this.user = new System.Windows.Forms.Label();
            this.casualleave = new System.Windows.Forms.Label();
            this.medicalleave = new System.Windows.Forms.Label();
            this.label6 = new System.Windows.Forms.Label();
            this.apply_leave_action = new System.Windows.Forms.Button();
            this.label7 = new System.Windows.Forms.Label();
            this.label8 = new System.Windows.Forms.Label();
            this.medicalpending = new System.Windows.Forms.Label();
            this.casualpending = new System.Windows.Forms.Label();
            this.applyingfor = new System.Windows.Forms.Label();
            this.SuspendLayout();
            // 
            // leavetype
            // 
            this.leavetype.Anchor = ((System.Windows.Forms.AnchorStyles)(((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.leavetype.DropDownStyle = System.Windows.Forms.ComboBoxStyle.DropDownList;
            this.leavetype.FormattingEnabled = true;
            this.leavetype.Items.AddRange(new object[] {
            "CASUAL",
            "MEDICAL"});
            this.leavetype.Location = new System.Drawing.Point(106, 137);
            this.leavetype.Name = "leavetype";
            this.leavetype.Size = new System.Drawing.Size(685, 28);
            this.leavetype.TabIndex = 0;
            this.leavetype.SelectedIndexChanged += new System.EventHandler(this.leavetype_SelectedIndexChanged);
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(24, 140);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(76, 20);
            this.label1.TabIndex = 1;
            this.label1.Text = "Apply For";
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(24, 192);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(65, 20);
            this.label2.TabIndex = 2;
            this.label2.Text = "Reason";
            // 
            // reason_txt
            // 
            this.reason_txt.Anchor = ((System.Windows.Forms.AnchorStyles)(((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.reason_txt.Location = new System.Drawing.Point(106, 194);
            this.reason_txt.MaxLength = 100;
            this.reason_txt.Multiline = true;
            this.reason_txt.Name = "reason_txt";
            this.reason_txt.Size = new System.Drawing.Size(685, 144);
            this.reason_txt.TabIndex = 3;
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Location = new System.Drawing.Point(24, 372);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(46, 20);
            this.label3.TabIndex = 4;
            this.label3.Text = "From";
            // 
            // from_date
            // 
            this.from_date.Location = new System.Drawing.Point(106, 367);
            this.from_date.Name = "from_date";
            this.from_date.Size = new System.Drawing.Size(274, 26);
            this.from_date.TabIndex = 5;
            this.from_date.Value = new System.DateTime(2017, 9, 23, 19, 7, 42, 0);
            // 
            // to_date
            // 
            this.to_date.Location = new System.Drawing.Point(106, 422);
            this.to_date.Name = "to_date";
            this.to_date.Size = new System.Drawing.Size(274, 26);
            this.to_date.TabIndex = 7;
            this.to_date.Value = new System.DateTime(2017, 9, 23, 19, 7, 42, 0);
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Location = new System.Drawing.Point(24, 426);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(27, 20);
            this.label4.TabIndex = 6;
            this.label4.Text = "To";
            // 
            // user
            // 
            this.user.AutoSize = true;
            this.user.Location = new System.Drawing.Point(20, 26);
            this.user.Name = "user";
            this.user.Size = new System.Drawing.Size(24, 20);
            this.user.TabIndex = 8;
            this.user.Text = "Hi";
            // 
            // casualleave
            // 
            this.casualleave.AutoSize = true;
            this.casualleave.Location = new System.Drawing.Point(280, 26);
            this.casualleave.Name = "casualleave";
            this.casualleave.Size = new System.Drawing.Size(105, 20);
            this.casualleave.TabIndex = 9;
            this.casualleave.Text = "Casual Leave";
            // 
            // medicalleave
            // 
            this.medicalleave.AutoSize = true;
            this.medicalleave.Location = new System.Drawing.Point(280, 71);
            this.medicalleave.Name = "medicalleave";
            this.medicalleave.Size = new System.Drawing.Size(110, 20);
            this.medicalleave.TabIndex = 10;
            this.medicalleave.Text = "Medical Leave";
            // 
            // label6
            // 
            this.label6.Anchor = ((System.Windows.Forms.AnchorStyles)(((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.label6.BorderStyle = System.Windows.Forms.BorderStyle.Fixed3D;
            this.label6.Location = new System.Drawing.Point(24, 483);
            this.label6.Name = "label6";
            this.label6.Size = new System.Drawing.Size(767, 3);
            this.label6.TabIndex = 11;
            this.label6.Text = "Hi";
            // 
            // apply_leave_action
            // 
            this.apply_leave_action.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Left)));
            this.apply_leave_action.Location = new System.Drawing.Point(24, 490);
            this.apply_leave_action.Name = "apply_leave_action";
            this.apply_leave_action.Size = new System.Drawing.Size(75, 37);
            this.apply_leave_action.TabIndex = 12;
            this.apply_leave_action.Text = "Apply";
            this.apply_leave_action.UseVisualStyleBackColor = true;
            this.apply_leave_action.Click += new System.EventHandler(this.apply_leave_action_Click);
            // 
            // label7
            // 
            this.label7.Anchor = ((System.Windows.Forms.AnchorStyles)(((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.label7.BorderStyle = System.Windows.Forms.BorderStyle.Fixed3D;
            this.label7.Location = new System.Drawing.Point(18, 116);
            this.label7.Name = "label7";
            this.label7.Size = new System.Drawing.Size(767, 3);
            this.label7.TabIndex = 13;
            this.label7.Text = "Hi";
            // 
            // label8
            // 
            this.label8.AutoSize = true;
            this.label8.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label8.ForeColor = System.Drawing.SystemColors.ControlDark;
            this.label8.Location = new System.Drawing.Point(25, 212);
            this.label8.Name = "label8";
            this.label8.Size = new System.Drawing.Size(63, 16);
            this.label8.TabIndex = 14;
            this.label8.Text = "Max : 100";
            // 
            // medicalpending
            // 
            this.medicalpending.AutoSize = true;
            this.medicalpending.Location = new System.Drawing.Point(555, 71);
            this.medicalpending.Name = "medicalpending";
            this.medicalpending.Size = new System.Drawing.Size(67, 20);
            this.medicalpending.TabIndex = 16;
            this.medicalpending.Text = "Pending";
            this.medicalpending.Visible = false;
            // 
            // casualpending
            // 
            this.casualpending.AutoSize = true;
            this.casualpending.Location = new System.Drawing.Point(555, 26);
            this.casualpending.Name = "casualpending";
            this.casualpending.Size = new System.Drawing.Size(67, 20);
            this.casualpending.TabIndex = 15;
            this.casualpending.Text = "Pending";
            this.casualpending.Visible = false;
            // 
            // applyingfor
            // 
            this.applyingfor.AutoSize = true;
            this.applyingfor.Location = new System.Drawing.Point(440, 372);
            this.applyingfor.Name = "applyingfor";
            this.applyingfor.Size = new System.Drawing.Size(24, 20);
            this.applyingfor.TabIndex = 17;
            this.applyingfor.Text = "Hi";
            // 
            // ApplyLeave
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(9F, 20F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(803, 533);
            this.Controls.Add(this.applyingfor);
            this.Controls.Add(this.medicalpending);
            this.Controls.Add(this.casualpending);
            this.Controls.Add(this.label8);
            this.Controls.Add(this.label7);
            this.Controls.Add(this.apply_leave_action);
            this.Controls.Add(this.label6);
            this.Controls.Add(this.medicalleave);
            this.Controls.Add(this.casualleave);
            this.Controls.Add(this.user);
            this.Controls.Add(this.to_date);
            this.Controls.Add(this.label4);
            this.Controls.Add(this.from_date);
            this.Controls.Add(this.label3);
            this.Controls.Add(this.reason_txt);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.leavetype);
            this.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.Name = "ApplyLeave";
            this.Text = "ApplyLeave";
            this.WindowState = System.Windows.Forms.FormWindowState.Maximized;
            this.Load += new System.EventHandler(this.ApplyLeave_Load);
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.ComboBox leavetype;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.TextBox reason_txt;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.DateTimePicker from_date;
        private System.Windows.Forms.DateTimePicker to_date;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.Label user;
        private System.Windows.Forms.Label casualleave;
        private System.Windows.Forms.Label medicalleave;
        private System.Windows.Forms.Label label6;
        private System.Windows.Forms.Button apply_leave_action;
        private System.Windows.Forms.Label label7;
        private System.Windows.Forms.Label label8;
        private System.Windows.Forms.Label medicalpending;
        private System.Windows.Forms.Label casualpending;
        private System.Windows.Forms.Label applyingfor;
    }
}