#include <bits/stdc++.h>
using namespace std;

bool tidakdisukai(int n)
{
	int count=0;
	int nsementara=n;
	while (nsementara!=0)
	{
		count++;
		nsementara=nsementara/10;
	}
	int bilangan[count];
	for (int temp=count-1; temp>=0; temp--)
	{
		bilangan[temp]=n%10;
		n=n/10;
	}
	
	bool pernah[10];
	for (int temp3=0; temp3<10; temp3++)
	{
		pernah[temp3]=false;
	}
	for (int temp2=0; temp2<count;temp2++)
	{
		if (pernah[bilangan[temp2]]=true)
		{
			return true;
		}
		pernah[bilangan[temp2]]=true;
	}
	return false;
}

int main ()
{
	int t;
	cin>>t;
	while (t--)
	{
		int n,m;
		cin>>n>>m;
		int count=0;
		for (int temp=n; temp<=m; temp++)
		{
			if (tidakdisukai[temp])
			{
				count++;
			}
		}
		cout<<count<<endl;
	}
}
