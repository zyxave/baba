#include <iostream>
#include <set>
#include <algorithm>

using namespace std;
void print(const string& item)
{
    cout<< endl << item ;
}

int main()
{
    set<string> sortedItems;
    int size,t;
    cin>>t;
    while(t--)
    {
    cin>>size;
    for(int i = 1; i <= size; ++i)
    {
        string name;
        cin >> name;

        sortedItems.insert(name);
    }
    for_each(sortedItems.begin(), sortedItems.end(), &print);}
    cout<<endl;

    return 0;
}
