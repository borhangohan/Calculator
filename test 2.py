marks_dict = {
  222345: [15, 25, 48],
  232467: [17, 23, 25],
  235843: [14, 28, 35],
  221578: [20, 27, 38],
  231864: [20, 28, 46],
  212346: [15, 15, 20],
  223578: [10, 20, 10],
  214689: [5, 7, 12],
  257907: [10, 12,14],
}

def fail_students(marks_dict):
    print('The failed students are: ')
    for id, marks in marks_dict.items():
        total = sum(marks)
        grade = calc_grades(total)
        if grade=='F':
            print(id,end=',')
  


def calc_grades(total):
  if total >= 85 and total <= 100:
    return "A"
  elif total >= 70 and total < 85:
    return "B"
  elif total >= 55 and total < 70:
    return "C"
  elif total >= 40 and total < 55:
    return "D"
  elif total >= 0 and total < 40:
    return "F"
  else:
    return "Invalid"

def get_grades(marks_dict):
  for id, marks in marks_dict.items():
    print(id, end=" ")
    total = sum(marks)
    grade = calc_grades(total)
    print(total, end=" ")
    print(grade)

get_grades(marks_dict)
print()
fail_students(marks_dict)
