#include <bits/stdc++.h>

using namespace std;

void f()
{
	string s;
	cin>>s;
	map<char,int> c;
	char dat[27];
	int fus=0;
	for(int a=0;a<s.length();a++)
	{
		c[s[a]]++;
		if(dat[fus]!=s[a])
		{
			dat[fus]=s[a];
			fus++;
		}
	}
	int arr[fus];
	for(int a=0;a<fus;a++)
		arr[a]=c[dat[a]];
	stack<int> ax;
	bool b=false,ay=false;
	ax.push(arr[0]);
	for(int a=1;a<fus;a++)
	{
		if(arr[a]!=ax.top() && b==false)
		{
			if(arr[a]-ax.top()==1)
			{
				arr[a]--;
				ax.push(arr[a]);
				b=true;
			}
			else if(arr[a]-ax.top()==1)
			{
				ax.top()--;
				ax.push(arr[a]);
				b=true;
			}
			else if(arr[a]==1)
			{
				ay=true;
				b=true;
			}
		}
		else if(arr[a]==ax.top())
			ax.push(arr[a]);
		else
			break;
	}
	if(ax.size()==fus)
		cout<<"YES";
	else if(ay==true && ax.size()+1==fus)
		cout<<"YES";
	else
		cout<<"NO";
	cout<<endl;
}

int main()
{
	int t;
	cin>>t;
	while(t--)
		f();
}
