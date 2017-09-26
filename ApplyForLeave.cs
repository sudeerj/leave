using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace LeaveApplication
{
    public class ApplyForLeave
    {
        public int id { get; set; }
        public int emp_id { get; set; }
        public String leave_type { get; set; }
        public String reason { get; set; }
        public String leave_date_from { get; set; }
        public String leave_date_to { get; set; }
    }
}
