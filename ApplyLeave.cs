using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.OleDb;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace LeaveApplication
{
    public partial class ApplyLeave : Form
    {
        ApplyForLeave applyForLeave;
        OleDbConnection conn;

        int remaining_casual,remaining_medical;

        public ApplyLeave()
        {
            InitializeComponent();

            user.Text = "Hi "+Properties.Settings.Default.Username;
        }

        private void ApplyLeave_Load(object sender, EventArgs e)
        {
            this.WindowState = FormWindowState.Maximized;
            applyForLeave = new ApplyForLeave();

            from_date.Format = DateTimePickerFormat.Custom;
            to_date.Format = DateTimePickerFormat.Custom;

            from_date.CustomFormat = "yyyy-MM-dd";
            to_date.CustomFormat = "yyyy-MM-dd";

            conn = new OleDbConnection(App.connString);

            if (conn.State != ConnectionState.Open)
                conn.Open();

            OleDbCommand oleDbCommand;

            //Getting Remaining
            using (oleDbCommand = new OleDbCommand("SELECT * FROM LEAVE_BALANCE where emp_id=1", conn))
            {

                //oleDbCommand.Parameters.Add("id", OleDbType.Integer, 5).Value = Properties.Settings.Default.CurrentUser;

                oleDbCommand.Prepare();


                OleDbDataAdapter da = new OleDbDataAdapter(oleDbCommand);
                DataSet ds = new DataSet();
                da.Fill(ds);

                if (ds.Tables[0].Rows.Count > 0)
                {
                    remaining_casual = Int32.Parse(ds.Tables[0].Rows[0].ItemArray[4].ToString());
                    remaining_medical = Int32.Parse(ds.Tables[0].Rows[0].ItemArray[6].ToString());

                    casualleave.Text = "Casual Leave Remaining : " + remaining_casual + " / " + ds.Tables[0].Rows[0].ItemArray[3].ToString();
                    medicalleave.Text = "Medical Leave Remaining : " + remaining_medical + " / " + ds.Tables[0].Rows[0].ItemArray[5].ToString();

                    from_date.MinDate = DateTime.Today.AddDays(1);
                    to_date.MinDate = DateTime.Today.AddDays(1);

                    from_date.Value = from_date.MinDate;

                    to_date.MaxDate = from_date.Value.AddDays(remaining_casual-1);

                    to_date.Value = to_date.MaxDate;

                    leavetype.SelectedIndex = 0;
                    applyingfor.Text = "Applying For : " + (to_date.Value.Subtract(from_date.Value).Days+1).ToString() + " Days";
                    from_date.ValueChanged += new EventHandler(from_date_ValueChanged);
                    to_date.ValueChanged += new EventHandler(to_date_ValueChanged);
                }

                //Binding Control With Class Property
                leavetype.DataBindings.Add("SelectedItem", applyForLeave, "leave_type", true, DataSourceUpdateMode.OnPropertyChanged);
                reason_txt.DataBindings.Add("Text", applyForLeave, "reason", true, DataSourceUpdateMode.OnPropertyChanged);

                applyForLeave.leave_date_from = from_date.Text;
                applyForLeave.leave_date_to = to_date.Text;
            }
            conn.Close();
        }

        private void dateValidation()
        {
            Boolean isCasual;
            if (leavetype.SelectedIndex == 0)
                isCasual=true;
            else
                isCasual=false;

            DateTime temp = from_date.Value;

            if (isCasual)
            {
                to_date.MaxDate = temp.Add(new TimeSpan((remaining_casual-1), 0, 0, 0));
            }
            else
            {
                to_date.MaxDate = temp.Add(new TimeSpan((remaining_medical-1), 0, 0, 0));
            }

            to_date.Value=to_date.MaxDate;
        }

        private void leavetype_SelectedIndexChanged(object sender, EventArgs e)
        {
            dateValidation();    
        }

        private void from_date_ValueChanged(object sender, EventArgs e)
        {
           dateValidation();
           to_date.MinDate = from_date.Value;
           applyForLeave.leave_date_from = from_date.Text;
        }

        private void to_date_ValueChanged(object sender, EventArgs e)
        {
           applyingfor.Text ="Applying For : "+ (to_date.Value.Subtract(from_date.Value).Days+1).ToString()+" Days";
           applyForLeave.leave_date_to = to_date.Text;
        }

        private void apply_leave_action_Click(object sender, EventArgs e)
        {
            if (applyForLeave.reason != null && applyForLeave.reason.Length > 0)
            {
                if (DatabaseOperation.applyLeaveDetail(applyForLeave) > 0)
                {
                    MessageBox.Show("Applied For Leave Successfully");
                }
                else
                {
                    MessageBox.Show("Can't Applied For Leave.Something goes wrong");
                }
            }
            else
            {
                MessageBox.Show("Some fields are missing");
            }
        }
    }
}
