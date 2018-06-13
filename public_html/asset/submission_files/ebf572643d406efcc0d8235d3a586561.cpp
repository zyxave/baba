#include <iostream>
using namespace std;

int main()
{
    string str[1000], temp;
    int t;
    cin>>t;
    while(t--)
    {
     int a;
     cin>>a;
     for(int i=0;i<a+1;i++)
     {
      getline(cin,str[i]);
     }
     for(int i=0;i<a;i++)
       for( int j=i+1;j<a+1;j++)
       {
          if(str[i] > str[j])
          {
            temp = str[i];
            str[i] = str[j];
            str[j] = temp;
          }
       }
     for(int i=1;i<a+1;i++)
     {
       cout << str[i] <<endl;
     }
    }
    return 0;
}
